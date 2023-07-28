<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\RareFormat;
use App\Services\RepositoryService\BenefitService;
use App\Services\RepositoryService\BlockService;
use App\Services\RepositoryService\CompanyService;
use App\Services\RepositoryService\FinishingService;
use App\Services\RepositoryService\GalleryService;
use App\Services\RepositoryService\GrandService;
use App\Services\RepositoryService\HouseService;
use App\Services\RepositoryService\InfrastructureService;
use App\Services\RepositoryService\MenuService;
use App\Services\RepositoryService\PageService;
use App\Services\RepositoryService\ProjectService;
use App\Services\RepositoryService\RareFormatService;
use App\Services\RepositoryService\SettingService;
use App\Services\RepositoryService\StaticService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }



    /**
     * Bootstrap any application services.
     */
    public function boot(
//        PageService $pageService,
//        MenuService $menuService,
//        GrandService $grandService,
//        RareFormatService $rareFormatService,
//        GalleryService $galleryService,
//        InfrastructureService $infrastructureService,
//        FinishingService $finishingService,
//        BenefitService $benefitService,
//        SettingService $settingService,
//        StaticService $staticService,
//        CompanyService $companyService,
//        ProjectService $projectService,
//        BlockService $blockService,
//        HouseService $houseService
    ): void
    {
//        $pages=$pageService->CachedPages();
//        $menus=$menuService->CachedMenus();
//        $rares=$rareFormatService->CachedRareFormats();
//        $grands=$grandService->CachedGrands();
//        $galleries=$galleryService->CachedGalleries();
//        $benefits=$benefitService->CachedBenefits();
//        $finishings=$finishingService->CachedFinishings();
//
//        $company=$companyService->CachedCompany();
//        $buildings=$projectService->CachedProjects();
//        $blocks=$blockService->CachedBlocks();
//        $houses=$houseService->CachedHouses();
////        dd($houses->toArray());
//
//
//        $infrastructure=$infrastructureService->CachedInfrastructures();
//        $about=$pages->where('id',1)->first();
//        $company=$company->where('id',1)->first();
//        $river=$pages->where('id',2)->first();
//        $contact=$pages->where('id',3)->first();
//        $location=$pages->where('id',4)->first();
//        $developer=$pages->where('id',7)->first();
//        $apart=$pages->where('id',5)->first();
//        $parking=$pages->where('id',6)->first();
//        $finish=$pages->where('id',7)->first();
//        $adverts=$pages->skip(8)->all();
//        $setting=$settingService->CachedSettings()->first();
//        $statics=$staticService->CachedStatics();
//        View::share([
//            'about'=>$about,
//            'menus'=>$menus,
//            'river'=>$river,
//            'contact'=>$contact,
//            'location'=>$location,
//            'developer'=>$developer,
//            'company'=>$company,
//            'buildings'=>$buildings,
//            'blocks'=>$blocks,
//            'houses'=>$houses,
//            'apart'=>$apart,
//            'parking'=>$parking,
//            'finish'=>$finish,
//            'finishings'=>$finishings,
//            'adverts'=>$adverts,
//            'grands'=>$grands,
//            'rares'=>$rares,
//            'infras'=>$infrastructure->sortDesc(),
//            'galleries'=>$galleries,
//            'benefits'=>$benefits,
//            'setting'=>$setting,
//            'statics'=>$statics,
//        ]);
    }
}
