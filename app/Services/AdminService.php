<?php

namespace App\Services;

use App\Enums\UserEnum;
use App\Jobs\SendForgotPasswordEmail;
use App\Jobs\SendPasswordNewAdmin;
use App\Mail\ForgotPassword;
use App\Models\Admin;
use App\Models\User;
use App\Repositories\AdminInterface;
use App\Repositories\AdminRepository;
use App\Repositories\ArticleRepository;
use App\Repositories\CommentRepository;
use App\Repositories\MessageRepository;
use App\Repositories\NotifyRepository;
use App\Repositories\PasswordResetRepository;
use App\Repositories\UserRepository;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Str;

class AdminService
{
    protected AdminInterface $adminRepository;

    public function __construct(
        AdminInterface $adminRepository,
    ) {
        $this->adminRepository = $adminRepository;
    }

    /**
     * adminLogin
     *
     * @param object $filter
     */
    public function adminLogin(object $filter)
    {
        $credentials = [
            'email' => $filter->email,
            'password' => $filter->password,
        ];
        if (Auth::guard('admin')->attempt($credentials, $filter->remember)) {
            Toastr::success('Login successful !');

            return redirect()->route('admin.account.infor');
        }
        Toastr::error('Login details are not valid !');

        return redirect()->back()->withInput();
    }

    /**
     * allAdmin
     *
     * @return array
     */
    public function allAdmin(Request $request, $input)
    {
        try {
            return $this->adminRepository->getAllAdmin($input)->paginate($input->per_page);
        } catch (\Exception $e) {
            return '';
        }
    }

    /**
     * addAdmin
     */
    public function addAdmin($newAdmin)
    {
        try {
            $password = Str::random(10);
            $newAdmin->password = Hash::make($password);

            Queue::push(new SendPasswordNewAdmin($newAdmin->email, $password));
            $this->adminRepository->addAdmin($newAdmin);
            Toastr::success('Admin added successfully');

            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::error($e->getMessage());

            return redirect()->back();
        }
    }

    /**
     * changeRole
     *
     * @param object $filter
     */
    public function changeRole($filter)
    {
        try {
            $this->adminRepository->changeRole($filter);
        } catch (\Exception $e) {
        }
    }

    /**
     * deleteAdmin
     *
     * @param int $id_admin
     */
    public function deleteAdmin($id_admin)
    {
        try {
            $admin = $this->adminRepository->getAdminById($id_admin);
            $admin->delete();
            Toastr::success('Delete admin successfully !');
        } catch (\Exception $e) {
            Toastr::success('Delete admin fail !');
        }

        return redirect()->back();
    }

    /**
     * ajaxSearchInforAdmin
     *
     * @param string $search
     * @param string role
     */
    public function ajaxSearchInforAdmin($input)
    {
        try {
            $admins = $this->adminRepository->ajaxSearchInforAdmin($input)->paginate($input->per_page);
            $renderHtml = view('admin.render_ajax.admin', compact('admins'))->render();
            $pagination = $admins->links()->toHtml();

            return response()->json([
                'render_html' => $renderHtml,
                'pagination' => $pagination,
            ]);
        } catch (\Exception $e) {
        }
    }

    /**
     * saveAvatar
     *
     * @param object $filter
     * @return string
     */
    public function saveAvatar(object $filter)
    {
        try {
            if ($filter->image) {
                $image = $filter->image;
                $filename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs(UserEnum::PATH_FILE_SAVE, $filename);

                return UserEnum::PATH_FILE_DB . $filename;
            }
        } catch (\Exception $e) {
        }
    }

    /**
     * updateInfor
     *
     * @param $filter
     */
    public function updateInfor($filter)
    {
        $admin = $this->adminRepository->findAdminById(Auth::guard('admin')->user()->id);
        $filter->avatar = null;
        if ($filter->image) {
            $filter->avatar = $this->saveAvatar($filter);
            if ($admin->avatar != 'storage/Blog/image/avatars/admin.png') {
                if ($admin->avatar) {
                    File::delete($admin->avatar);
                }
            }
        }
        try {
            $admin = $this->adminRepository->updateInfor($admin, $filter);
            Toastr::success('Successfully updated !');

            return redirect()->route('admin.view_infor');
        } catch (Exception $e) {
            Toastr::error('Update failed !');

            return redirect()->back()->withInput();
        }
    }

    /**
     * changePassword
     *
     * @param $filter
     */
    public function changePassword($filter)
    {
        try {
            $admin = $this->adminRepository->findAdminById(Auth::guard('admin')->user()->id);
            if ($admin->password == null) {
                $this->adminRepository->updatePassword($admin, Hash::make($filter->new_password));
            } else {
                if ($filter->old_password != $filter->confirm_old_password) {
                    Toastr::error('Old password and confirm old password do not match !');

                    return redirect()->back()->withInput();
                }

                if (!Hash::check($filter->old_password, $admin->password)) {
                    Toastr::error('Old password is incorrect !');

                    return redirect()->back()->withInput();
                }
                $this->adminRepository->updatePassword($admin, Hash::make($filter->new_password));
            }
            Toastr::success('Updated password successfully !');

            return redirect()->route('admin.view_infor');
        } catch (\Exception $e) {
        }
    }

    /**
     * forgotSend
     *
     * @param string $email
     */
    public function forgotSend($email)
    {
        try {
            $token = Str::random(32);
            $isUser = 0;
            $admin = PasswordResetRepository::findPasswordReset($email, $isUser);
            if ($admin) {
                PasswordResetRepository::updateToken($admin, $token);
            } else {
                PasswordResetRepository::createToken($email, $token, $isUser);
            }
            Toastr::success('Send Mail Password Reset Success !');
            $url = UserEnum::DOMAIN_PATH . 'admin/forgot-form?token=' . $token;
            // Mail::to($email)->send(new ForgotPassword($url));
            // SendForgotPasswordEmail::dispatch($email, $url);
            Log::info("Add jobs to Queue , Email: $email with URL: $url");
            Queue::push(new SendForgotPasswordEmail($email, $url));

            return redirect()->back();
        } catch (\Exception $e) {
        }
    }

    /**
     * forgotUpdate
     *
     * @param object $filter
     */
    public function forgotUpdate($filter)
    {
        try {
            $isUser = 0;
            $newPassword = Hash::make($filter->new_password);
            $adminReset = PasswordResetRepository::findPasswordResetByToken($filter->token);
            if ($adminReset) {
                if ($filter->new_password != $filter->confim_new_password) {
                    Toastr::error('New password and confirm new password do not match !');

                    return redirect()->back()->withInput();
                }
                $admin = $this->adminRepository->findAdminbyEmail($adminReset->email);
                if ($admin) {
                    $this->adminRepository->updatePassword($admin, $newPassword);
                    Toastr::success('Reset Password successful !');
                    PasswordResetRepository::deleteUser($adminReset, $isUser);

                    return redirect('admin/login');
                }
                Toastr::error('Can not find the account !');

                return redirect('register');
            } else {
                Toastr::error('Token has expired !');

                return redirect('admin/login');
            }
        } catch (\Exception $e) {
        }
    }

    /**
     * getTitle
     *
     * @param string $title_main
     * @param string $title_sub
     * @return array
     */
    public function getTitle($titleMain, $titleSub)
    {
        $title['title_main'] = $titleMain;
        $title['title_sub'] = $titleSub;

        return $title;
    }

    /**
     * statistical
     *
     * @return object
     */
    public function statistical()
    {
        try {
            // Get the first and last day of the current week, month and year
            $startDateOfWeek = Carbon::now()->startOfWeek();
            $endDateOfWeek = Carbon::now()->endOfWeek();
            $startDateOfMonth = Carbon::now()->startOfMonth();
            $endDateOfMonth = Carbon::now()->endOfMonth();
            $startDateOfYear = Carbon::now()->startOfYear();
            $endDateOfYear = Carbon::now()->endOfYear();

            // Statistics on the number of articles this year
            $labelsArticle = [
                'January', 'February', 'March', 'April', 'May', 'June',
                'July', 'August', 'September', 'October', 'November', 'December',
            ];
            $yearlyStats = ArticleRepository::getYearlyStatsYear($startDateOfYear, $endDateOfYear);
            $monthlyCountsArticle = array_fill_keys($labelsArticle, 0);
            foreach ($yearlyStats as $stat) {
                $monthName = date('F', mktime(0, 0, 0, $stat->month, 1));
                $monthlyCountsArticle[$monthName] = $stat->count;
            }
            $labelArticle = 'Statistics on the number of articles by year';

            // Statistics of comments this year
            $labelsComment = [
                'January', 'February', 'March', 'April', 'May', 'June',
                'July', 'August', 'September', 'October', 'November', 'December',
            ];
            $yearlyStats = CommentRepository::getYearlyStatsYear($startDateOfYear, $endDateOfYear);
            $monthlyCountsComments = array_fill_keys($labelsArticle, 0);
            foreach ($yearlyStats as $stat) {
                $monthName = date('F', mktime(0, 0, 0, $stat->month, 1));
                $monthlyCountsComments[$monthName] = $stat->count;
            }
            $labelComment = 'Statistics on the number of comment by year';

            // Statistics on the number of users this year
            $labelsUserLine = [
                'January', 'February', 'March', 'April', 'May', 'June',
                'July', 'August', 'September', 'October', 'November', 'December',
            ];
            $yearlyStats = UserRepository::getYearlyStatsYear($startDateOfYear, $endDateOfYear);
            $monthlyCountsUser = array_fill_keys($labelsUserLine, 0);
            foreach ($yearlyStats as $stat) {
                $monthName = date('F', mktime(0, 0, 0, $stat->month, 1));
                $monthlyCountsUser[$monthName] = $stat->count;
            }
            $labelUserLine = 'Statistics on the number of user by year';

            // user
            $userGgBlock = UserRepository::getStatisticalUser('!=', 0);
            $userGg = UserRepository::getStatisticalUser('!=', 1);
            $userDfBlock = UserRepository::getStatisticalUser('=', 0);
            $userDf = UserRepository::getStatisticalUser('=', 1);
            $dataUsers = [$userGgBlock, $userGg, $userDfBlock, $userDf];
            $labelUsers = ['User Google Block', 'User Google Accept', 'User Default Block', 'User Default Accpet'];

            // statis
            $numberUser = count(UserRepository::getAllUserStatic());
            $numberAdmin = count(AdminRepository::getAllAdminStatic());
            $numberArticle = count(ArticleRepository::getAllArticleStatic());
            $numberComment = count(CommentRepository::getAllCommentStatic());
            $numberNotify = count(NotifyRepository::getAllNotifyStatic());
            $numberMessage = count(MessageRepository::getAllMessageStatic());

            return view('admin.manage.statistical', [
                'label_article' => $labelArticle,
                'labels_article' => $labelsArticle,
                'data_article' => $monthlyCountsArticle,

                'label_comment' => $labelComment,
                'labels_comment' => $labelsComment,
                'data_comment' => $monthlyCountsComments,

                'label_user_line' => $labelUserLine,
                'labels_user_line' => $labelsUserLine,
                'data_user_line' => $monthlyCountsUser,

                'number_user' => $numberUser,
                'number_admin' => $numberAdmin,
                'number_article' => $numberArticle,
                'number_comment' => $numberComment,
                'number_notify' => $numberNotify,
                'number_message' => $numberMessage,

                'labels_user' => $labelUsers,
                'data_user' => $dataUsers,

                'title' => $this->getTitle('Statistical', 'Statistical Detail'),
            ]);
        } catch (\Exception $e) {
        }
    }

    /**
     * statisticalArticle
     *
     * @param Request $request
     * @return object
     */
    public function statisticalArticle(Request $request)
    {
        try {
            $startDateOfWeek = Carbon::now()->startOfWeek();
            $endDateOfWeek = Carbon::now()->endOfWeek();
            $startDateOfMonth = Carbon::now()->startOfMonth();
            $endDateOfMonth = Carbon::now()->endOfMonth();
            $startDateOfYear = Carbon::now()->startOfYear();
            $endDateOfYear = Carbon::now()->endOfYear();

            $selectedValue = $request->selected_value;
            if ($selectedValue == 'year') {
                // Statistics on the number of articles this year
                $labelsArticle = [
                    'January', 'February', 'March', 'April', 'May', 'June',
                    'July', 'August', 'September', 'October', 'November', 'December',
                ];
                $yearlyStats = ArticleRepository::getYearlyStatsYear($startDateOfYear, $endDateOfYear);
                $monthlyCountsArticle = array_fill_keys($labelsArticle, 0);
                foreach ($yearlyStats as $stat) {
                    $monthName = date('F', mktime(0, 0, 0, $stat->month, 1));
                    $monthlyCountsArticle[$monthName] = $stat->count;
                }
                $labelArticle = 'Statistics on the number of articles by year';
            } elseif ($selectedValue == 'month') {
                // Get the first and last day of the current month
                $startDateOfMonth = date('Y-m-01');
                $endDateOfMonth = date('Y-m-t');
                $monthlyStats = ArticleRepository::getMonthlyStats($startDateOfMonth, $endDateOfMonth);
                $monthlyCountsArticle = [];
                for ($day = 1; $day <= 31; $day++) {
                    $monthlyCountsArticle[$day] = 0;
                }
                foreach ($monthlyStats as $stat) {
                    $monthlyCountsArticle[$stat->day] = $stat->count;
                }
                $labelArticle = 'Statistics on the number of articles for the current month';
                $labelsArticle = [];
            } else {
                // Get the first and last day of the current week
                $startDateOfWeek = date('Y-m-d', strtotime('this week'));
                $dayStart = date('d', strtotime($startDateOfWeek));
                $endDateOfWeek = date('Y-m-d', strtotime('this week +6 days'));
                $weeklyStats = ArticleRepository::getWeeklyStats($startDateOfWeek, $endDateOfWeek);
                $monthlyCountsArticle = [0, 0, 0, 0, 0, 0, 0];
                foreach ($weeklyStats as $index => $stat) {
                    $monthlyCountsArticle[$stat->day - $dayStart] = $stat->count;
                }
                $labelArticle = 'Statistics on the number of articles for the current week';
                $labelsArticle = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
            }

            $renderHtml = view('admin.render_ajax.statistical_article', [
                'label_article' => $labelArticle,
                'labels_article' => $labelsArticle,
                'data_article' => $monthlyCountsArticle,
            ])->render();

            return response()->json([
                'render_html' => $renderHtml,
                'selected_value' => $selectedValue,
            ]);
        } catch (\Exception $e) {
        }
    }

    /**
     * statisticalComment
     *
     * @param Request $request
     * @return object
     */
    public function statisticalComment(Request $request)
    {
        try {
            $startDateOfWeek = Carbon::now()->startOfWeek();
            $endDateOfWeek = Carbon::now()->endOfWeek();
            $startDateOfMonth = Carbon::now()->startOfMonth();
            $endDateOfMonth = Carbon::now()->endOfMonth();
            $startDateOfYear = Carbon::now()->startOfYear();
            $endDateOfYear = Carbon::now()->endOfYear();

            $selectedValue = $request->selected_value;
            if ($selectedValue == 'year') {
                // Statistics on the number of comments this year
                $labelsComment = [
                    'January', 'February', 'March', 'April', 'May', 'June',
                    'July', 'August', 'September', 'October', 'November', 'December',
                ];
                $yearlyStats = CommentRepository::getYearlyStatsYear($startDateOfYear, $endDateOfYear);
                $monthlyCountsComment = array_fill_keys($labelsComment, 0);
                foreach ($yearlyStats as $stat) {
                    $monthName = date('F', mktime(0, 0, 0, $stat->month, 1));
                    $monthlyCountsComment[$monthName] = $stat->count;
                }
                $labelComment = 'Statistics on the number of comments by year';
            } elseif ($selectedValue == 'month') {
                // Get the first and last day of the current month
                $startDateOfMonth = date('Y-m-01');
                $endDateOfMonth = date('Y-m-t');
                $monthlyStats = CommentRepository::getMonthlyStats($startDateOfMonth, $endDateOfMonth);
                $monthlyCountsComment = [];
                for ($day = 1; $day <= 31; $day++) {
                    $monthlyCountsComment[$day] = 0;
                }
                foreach ($monthlyStats as $stat) {
                    $monthlyCountsComment[$stat->day] = $stat->count;
                }
                $labelComment = 'Statistics on the number of comments for the current month';
                $labelsComment = [];
            } else {
                // Get the first and last day of the current week
                $startDateOfWeek = date('Y-m-d', strtotime('this week'));
                $dayStart = date('d', strtotime($startDateOfWeek));
                $endDateOfWeek = date('Y-m-d', strtotime('this week +6 days'));
                $weeklyStats = CommentRepository::getWeeklyStats($startDateOfWeek, $endDateOfWeek);
                $monthlyCountsComment = [0, 0, 0, 0, 0, 0, 0];
                foreach ($weeklyStats as $index => $stat) {
                    $monthlyCountsComment[$stat->day - $dayStart] = $stat->count;
                }
                $labelComment = 'Statistics on the number of comments for the current week';
                $labelsComment = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
            }

            $renderHtml = view('admin.render_ajax.statistical_comment', [
                'label_comment' => $labelComment,
                'labels_comment' => $labelsComment,
                'data_comment' => $monthlyCountsComment,
            ])->render();

            return response()->json([
                'render_html' => $renderHtml,
                'selected_value' => $selectedValue,
            ]);
        } catch (\Exception $e) {
        }
    }

    /**
     * statisticalUser
     *
     * @param Request $request
     * @return object
     */
    public function statisticalUser(Request $request)
    {
        try {
            $startDateOfWeek = Carbon::now()->startOfWeek();
            $endDateOfWeek = Carbon::now()->endOfWeek();
            $startDateOfMonth = Carbon::now()->startOfMonth();
            $endDateOfMonth = Carbon::now()->endOfMonth();
            $startDateOfYear = Carbon::now()->startOfYear();
            $endDateOfYear = Carbon::now()->endOfYear();

            $selectedValue = $request->selected_value;
            if ($selectedValue == 'year') {
                // Statistics on the number of user this year
                $labelsUser = [
                    'January', 'February', 'March', 'April', 'May', 'June',
                    'July', 'August', 'September', 'October', 'November', 'December',
                ];
                $yearlyStats = UserRepository::getYearlyStatsYear($startDateOfYear, $endDateOfYear);
                $monthlyCountsUser = array_fill_keys($labelsUser, 0);
                foreach ($yearlyStats as $stat) {
                    $monthName = date('F', mktime(0, 0, 0, $stat->month, 1));
                    $monthlyCountsUser[$monthName] = $stat->count;
                }
                $labelUser = 'Statistics on the number of users by year';
            } elseif ($selectedValue == 'month') {
                // Get the first and last day of the current month
                $startDateOfMonth = date('Y-m-01');
                $endDateOfMonth = date('Y-m-t');
                $monthlyStats = UserRepository::getMonthlyStats($startDateOfMonth, $endDateOfMonth);
                $monthlyCountsUser = [];
                for ($day = 1; $day <= 31; $day++) {
                    $monthlyCountsUser[$day] = 0;
                }
                foreach ($monthlyStats as $stat) {
                    $monthlyCountsUser[$stat->day] = $stat->count;
                }
                $labelUser = 'Statistics on the number of users for the current month';
                $labelsUser = [];
            } else {
                // Get the first and last day of the current week
                $startDateOfWeek = date('Y-m-d', strtotime('this week'));
                $dayStart = date('d', strtotime($startDateOfWeek));
                $endDateOfWeek = date('Y-m-d', strtotime('this week +6 days'));
                $weeklyStats = UserRepository::getWeeklyStats($startDateOfWeek, $endDateOfWeek);
                $monthlyCountsUser = [0, 0, 0, 0, 0, 0, 0];
                foreach ($weeklyStats as $index => $stat) {
                    $monthlyCountsUser[$stat->day - $dayStart] = $stat->count;
                }
                $labelUser = 'Statistics on the number of users for the current week';
                $labelsUser = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
            }

            $renderHtml = view('admin.render_ajax.statistical_user', [
                'label_user_line' => $labelUser,
                'labels_user_line' => $labelsUser,
                'data_user_line' => $monthlyCountsUser,
            ])->render();

            return response()->json([
                'render_html' => $renderHtml,
                'selected_value' => $selectedValue,
            ]);
        } catch (\Exception $e) {
        }
    }
}
