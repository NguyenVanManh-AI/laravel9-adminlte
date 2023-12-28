<?php

namespace App\Repositories;

/**
 * Interface ExampleRepository.
 */
interface UserInterface extends RepositoryInterface
{
    public function getUser($emailOrUsername);

    public function getUserByUsername($filter);

    public function findUserbyEmail($email);

    public function updateUser($user, $filter);

    public function createUser($filter);

    public function findUserByGoogleId($id);

    public function updateIdGoogle($user, $id);

    public function createUserGoogle($user);

    public function findUserByGithubId($id);

    public function updateIdGithub($user, $id);

    public function createUserGithub($user);

    public function updatePassword($user, $password);

    public function updateInfor($user, $filter);

    public static function findUserById($id);

    public static function searchUser($searchText);

    public function getAllUser($input);

    public function changeStatus($idUser);

    public function ajaxSearchUser($input);

    public static function getListUser($idUsers);

    public static function getYearlyStatsYear($startDateOfYear, $endDateOfYear);

    public static function getAllUserStatic();

    public static function getMonthlyStats($startDateOfMonth, $endDateOfMonth);

    public static function getWeeklyStats($startDateOfWeek, $endDateOfWeek);

    public static function getListUsers($relatedUserIds);

    public static function getStatisticalUser($conditions, $status);
}
