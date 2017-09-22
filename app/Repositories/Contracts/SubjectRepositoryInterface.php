<?php
namespace App\Repositories\Contracts;

interface SubjectRepositoryInterface extends RepositoryInterface
{
    public function getSubjectByTrending();
}
