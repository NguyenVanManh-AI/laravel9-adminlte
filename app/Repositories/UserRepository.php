<?php

namespace App\Repositories;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;

class UserRepository extends BaseRepository implements UserInterface
{
    public function getModel()
    {
        return User::class;
    }

    /**
     * getUser
     *
     * @param string $emailOrUsername
     * @return object
     */
    public function getUser($emailOrUsername)
    {
        return $this->model
            ->when($emailOrUsername, fn ($q) => $q->where('username', '=', $emailOrUsername))
            ->first();
    }

    /**
     * getAllUser
     *
     * @return array
     */
    public function getAllUser($input)
    {
        return $this->model->where(function ($query) use ($input) {
            $query->where('name', 'like', '%' . $input->search . '%')
                ->orWhere('email', 'like', '%' . $input->search . '%')
                ->orWhere('username', 'like', '%' . $input->search . '%');
        })
            ->where('status', 'like', '%' . $input->block . '%');
    }

    /**
     * getUserByUsername
     *
     * @param object $filter
     * @return object
     */
    public function getUserByUsername($filter)
    {
        return $this->model
            ->when($filter->email, fn ($q) => $q->where('email', '!=', $filter->email))
            ->when($filter->username, fn ($q) => $q->where('username', '=', $filter->username))
            ->first();
    }

    /**
     * findUserbyEmail
     *
     * @param string $email
     * @return object
     */
    public function findUserbyEmail($email)
    {
        return $this->model
            ->when($email, fn ($q) => $q->where('email', '=', $email))
            ->first();
    }

    /**
     * updateUser
     *
     * @param object $user
     * @param object $filter
     */
    public function updateUser($user, $filter)
    {
        DB::beginTransaction();
        try {
            $user = $this->model->find($user->id);
            $updateData = [
                'password' => $filter->password,
                'avatar' => $filter->avatar,
                'name' => $filter->name,
            ];
            $user->update($updateData);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    /**
     * createUser
     *
     * @param object $filter
     * @return object
     */
    public function createUser($filter)
    {
        DB::beginTransaction();
        try {
            $newUser = $this->model->create([
                'name' => $filter->name,
                'email' => $filter->email,
                'password' => $filter->password,
                'avatar' => $filter->avatar,
                'role' => 'user',
            ]);
            DB::commit();

            return $newUser;
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    /**
     * findUserByGithubId
     *
     * @param int $id
     * @return object
     */
    public function findUserByGithubId($id)
    {
        return $this->model
            ->when($id, fn ($q) => $q->where('github_id', '=', $id))
            ->first();
    }

    /**
     * updateIdGithub
     *
     * @param object $user
     * @param int $id
     */
    public function updateIdGithub($user, $id)
    {
        DB::beginTransaction();
        try {
            $user = $this->model->find($user->id);
            $updateData = ['github_id' => $id];
            $user->update($updateData);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    /**
     * createUserGithub
     *
     * @param object $user
     * @return object
     */
    public function createUserGithub($user)
    {
        DB::beginTransaction();
        try {
            $newUserGithub = $this->model->create([
                'name' => $user->name,
                'email' => $user->email,
                'github_id' => $user->id,
                'username' => 'user_' . $user->id,
                'avatar' => $user->avatar,
                'status' => 1,
            ]);
            DB::commit();

            return $newUserGithub;
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    /**
     * findUserByGoogleId
     *
     * @param int $id
     * @return object
     */
    public function findUserByGoogleId($id)
    {
        return $this->model
            ->when($id, fn ($q) => $q->where('google_id', '=', $id))
            ->first();
    }

    /**
     * updateIdGoogle
     *
     * @param object $user
     * @param int $id
     */
    public function updateIdGoogle($user, $id)
    {
        DB::beginTransaction();
        try {
            $user = $this->model->find($user->id);
            $updateData = ['google_id' => $id];
            $user->update($updateData);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    /**
     * createUserGoogle
     *
     * @param object $user
     * @return object
     */
    public function createUserGoogle($user)
    {
        DB::beginTransaction();
        try {
            $newUserGoogle = $this->model->create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id' => $user->id,
                'avatar' => $user->avatar,
                'role' => 'user',
            ]);
            DB::commit();

            return $newUserGoogle;
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    /**
     * updatePassword
     *
     * @param object $user
     * @param srting $password
     */
    public function updatePassword($user, $password)
    {
        DB::beginTransaction();
        try {
            $user = $this->model->find($user->id);
            $updateData = ['password' => $password];
            $user->update($updateData);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    /**
     * findUserById
     *
     * @param int $id
     * @return object
     */
    public static function findUserById($id)
    {
        return (new self)->model->find($id);
    }

    /**
     * updateInfor
     *
     * @param object $user
     * @param object $filter
     */
    public function updateInfor($user, $filter)
    {
        DB::beginTransaction();
        try {
            $user = $this->model->find($user->id);
            $updateData = [
                'name' => $filter->name,
                'username' => $filter->username,
                'email' => $filter->email,
                'gender' => $filter->gender,
                'avatar' => $filter->avatar ?? $user->avatar,
            ];
            $user->update($updateData);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    /**
     * searchUser
     *
     * @param string $search_text
     * @return object
     */
    public static function searchUser($searchText)
    {
        return (new self)->model->where('name', 'like', '%' . $searchText . '%')->take(10)->get();
    }

    /**
     * changeStatus
     *
     * @param int $id_user
     */
    public function changeStatus($idUser)
    {
        DB::beginTransaction();
        try {
            $user = $this->model::findOrFail($idUser);
            $user->status = $user->status === 1 ? 0 : 1;
            $user->save();
            DB::commit();

            return $user->status;
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    /**
     * ajaxSearchUser
     *
     * @param string $search_text
     * @return array
     */
    public function ajaxSearchUser($input)
    {
        return $this->model->where(function ($query) use ($input) {
            $query->where('name', 'like', '%' . $input->search . '%')
                ->orWhere('email', 'like', '%' . $input->search . '%')
                ->orWhere('username', 'like', '%' . $input->search . '%');
        })
            ->where('status', 'like', '%' . $input->block . '%');
    }

    /**
     * getListUser
     *
     * @param array $idUsers
     * @return object
     */
    public static function getListUser($idUsers)
    {
        return (new self)->model->whereIn('id', $idUsers)->get();
    }

    /**
     * getYearlyStatsYear
     *
     * @param int $startDateOfYear
     * @param int $endDateOfYear
     * @return object
     */
    public static function getYearlyStatsYear($startDateOfYear, $endDateOfYear)
    {
        return (new self)->model->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as count'))
            ->whereBetween('created_at', [$startDateOfYear, $endDateOfYear])
            ->groupBy('month')
            ->get();
    }

    /**
     * getAllUserStatic
     *
     * @return array
     */
    public static function getAllUserStatic()
    {
        return (new self)->model->all();
    }

    /**
     * getMonthlyStats
     *
     * @param int $startDateOfMonth
     * @param int $endDateOfMonth
     * @return object
     */
    public static function getMonthlyStats($startDateOfMonth, $endDateOfMonth)
    {
        return (new self)->model->select(DB::raw('DAY(created_at) as day'), DB::raw('COUNT(*) as count'))
            ->whereBetween('created_at', [$startDateOfMonth, $endDateOfMonth])
            ->groupBy('day')
            ->get();
    }

    /**
     * getWeeklyStats
     *
     * @param int $startDateOfWeek
     * @param int $endDateOfWeek
     * @return object
     */
    public static function getWeeklyStats($startDateOfWeek, $endDateOfWeek)
    {
        return (new self)->model->select(DB::raw('DAY(created_at) as day'), DB::raw('COUNT(*) as count'))
            ->whereBetween('created_at', [$startDateOfWeek, $endDateOfWeek])
            ->groupBy('day')
            ->get();
    }

    /**
     * getListUsers
     *
     * @param object $relatedUserIds
     * @return object
     */
    public static function getListUsers($relatedUserIds)
    {
        return (new self)->model->whereIn('id', $relatedUserIds)->get();
    }

    /**
     * getStatisticalUser
     *
     * @param string $conditions
     * @param int $status
     * @return object
     */
    public static function getStatisticalUser($conditions, $status)
    {
        return (new self)->model->where('google_id', $conditions, null)->where('status', '=', $status)->count();
    }
}
