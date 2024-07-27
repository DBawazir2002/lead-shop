<?php

namespace App\Providers;

use App\Interfaces\Address\AddressRepositoryInterface;
use App\Interfaces\Address\AddressServiceInterface;
use App\Interfaces\Admin\AdminRepositoryInterface;
use App\Interfaces\Admin\AdminServiceInterface;
use App\Interfaces\Auth\AuthServiceInterface;
use App\Interfaces\Category\CategoryRepositoryInterface;
use App\Interfaces\Category\CategoryServiceInterface;
use App\Interfaces\City\CityRepositoryInterface;
use App\Interfaces\City\CityServiceInterface;
use App\Interfaces\Country\CountryRepositoryInterface;
use App\Interfaces\Country\CountryServiceInterface;
use App\Repositories\CategoryRepository;
use App\Repositories\UserRepository;
use App\Interfaces\User\UserRepositoryInterface;
use App\Interfaces\User\UserServiceInterface;
use App\Repositories\AddressRepository;
use App\Repositories\AdminRepository;
use App\Repositories\CityRepository;
use App\Repositories\CountryRepository;
use App\Services\AddressService;
use App\Services\AdminService;
use App\Services\AuthService;
use App\Services\CityService;
use App\Services\CategoryService;
use App\Services\CountryService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
       $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
       $this->app->bind(UserServiceInterface::class, UserService::class);

       $this->app->bind(CountryRepositoryInterface::class, CountryRepository::class);
       $this->app->bind(CountryServiceInterface::class, CountryService::class);

       $this->app->bind(CityRepositoryInterface::class, CityRepository::class);
       $this->app->bind(CityServiceInterface::class, CityService::class);

       $this->app->bind(AddressRepositoryInterface::class, AddressRepository::class);
       $this->app->bind(AddressServiceInterface::class, AddressService::class);

       $this->app->bind(AuthServiceInterface::class, AuthService::class);

       $this->app->bind(AdminRepositoryInterface::class, AdminRepository::class);
       $this->app->bind(AdminServiceInterface::class, AdminService::class);

        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(CategoryServiceInterface::class, CategoryService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
