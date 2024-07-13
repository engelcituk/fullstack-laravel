<?php

namespace App\ViewModels\Backoffice;

use App\Models\Category;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use App\Services\Frontend\UIElements\StatItems\StatDefault;
use App\Services\Frontend\StatsGenerator;
use App\Traits\ViewModels\WithUser;
use App\ViewModels\VielModel;

class GetDashboardViewModel extends ViewModel {

    use WithUser;

    public function __construct(
        protected readonly StatsGenerator $statsGenerator,
    ){

    }

    public function stats(): array {
        return $this->statsGenerator
            ->addStat(
                new StatDefault(
                    label: 'Total Usuarios',
                    value: User::count(),
                )
            )
            ->addStat(
                new StatDefault(
                    label: 'Total Cursos',
                    value: Course::count(),
                )
            )
            ->addStat(
                new StatDefault(
                    label: 'Total Categorías',
                    value: Category::count(),
                )
            )
            ->addStat(
                new StatDefault(
                    label: 'Total lecciones',
                    value: Lesson::count(),
                )
            )
            ->getStats();
    }
}
