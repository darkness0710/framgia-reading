<?php
namespace App\Repositories\Contracts;

interface SubjectRepositoryInterface extends RepositoryInterface
{
    public function getSubjectByTrending($select = ['*'], $withCount = [], $limit);

    public function createSubjectByAjax($request);
    
    public function countSubject($select = ['*']);

    public function getName($select = ['*']);
}
