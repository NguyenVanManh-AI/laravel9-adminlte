<?php

namespace App\Repositories;

use App\Models\Admin;
use Exception;
use Illuminate\Support\Facades\DB;

class AdminRepository extends BaseRepository implements AdminInterface
{
    public function getModel()
    {
        return Admin::class;
    }

    /**
     * getAllAdmin
     *
     * @return array
     */
    public function getAllAdmin($input)
    {
        return $this->model->where(function ($query) use ($input) {
            $query->where('name', 'like', '%' . $input->search . '%')
                ->orWhere('email', 'like', '%' . $input->search . '%');
        })
            ->where('role', 'like', '%' . $input->role . '%');
    }

    /**
     * addAdmin
     *
     * @param $admin
     */
    public function addAdmin($admin)
    {
        DB::beginTransaction();
        try {
            $newAdmin = $this->model->create([
                'name' => $admin->name,
                'email' => $admin->email,
                'role' => 0,
                'avatar' => 'storage/Blog/image/avatars/admin.png',
                'password' => $admin->password,
            ]);
            DB::commit();

            return $newAdmin;
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    /**
     * changeRole
     *
     * @param object $filter
     */
    public function changeRole($input)
    {
        DB::beginTransaction();
        try {
            $admin = $this->model->find($input->id);
            $updateData = [
                'role' => $input->role,
            ];
            $admin->update($updateData);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function getAdminById($id)
    {
        return $this->model
            ->when($id, fn ($q) => $q->where('id', '=', $id))
            ->first();
    }

    public function ajaxSearchInforAdmin($input)
    {
        return $this->model->where(function ($query) use ($input) {
            $query->where('name', 'like', '%' . $input->search . '%')
                ->orWhere('email', 'like', '%' . $input->search . '%');
        })
            ->where('role', 'like', '%' . $input->role . '%');
    }

    /**
     * findUserById
     *
     * @param int $id
     * @return object
     */
    public function findAdminById($id)
    {
        return $this->model->find($id);
    }

    /**
     * updateInfor
     *
     * @param object $user
     * @param object $filter
     */
    public function updateInfor($admin, $filter)
    {
        DB::beginTransaction();
        try {
            $admin = $this->model->find($admin->id);
            $updateData = [
                'name' => $filter->name,
                'avatar' => $filter->avatar ?? $admin->avatar,
            ];
            $admin->update($updateData);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    /**
     * updatePassword
     *
     * @param object $admin
     * @param srting $password
     */
    public function updatePassword($admin, $password)
    {
        DB::beginTransaction();
        try {
            $user = $this->model->find($admin->id);
            $updateData = ['password' => $password];
            $user->update($updateData);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    /**
     * findAdminbyEmail
     *
     * @param string $email
     * @return object
     */
    public function findAdminbyEmail($email)
    {
        return $this->model
            ->when($email, fn ($q) => $q->where('email', '=', $email))
            ->first();
    }

    /**
     * getAllAdminStatic
     *
     * @return array
     */
    public static function getAllAdminStatic()
    {
        return (new self)->model->all();
    }
}
