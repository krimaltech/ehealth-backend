<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(RoleSeeder::class);      
        $this->call(AdminTypeSeeder::class);
        $this->call(EmployeeTypeSeeder::class);
        $this->call(VendorTypeSeeder::class);
        $this->call(ScreeningsTableSeeder::class);
        $this->call(CompanyDetailsTableSeeder::class);
        $this->call(AmbulancesTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(TestsTableSeeder::class);
        $this->call(SymptomsTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    	$this->call(TeamCategoriesTableSeeder::class);
        $this->call(TeamsTableSeeder::class);        
        $this->call(PackagesTableSeeder::class);
        $this->call(PackageScreeningsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(OurServicesTableSeeder::class);
        $this->call(HospitalsTableSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        $this->call(DistrictsTableSeeder::class);
        $this->call(MunicipalitiesTableSeeder::class);
        $this->call(WardsTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(AmbulanceRatesTableSeeder::class);
        $this->call(LabDepartmentsTableSeeder::class);
        $this->call(LabProfilesTableSeeder::class);
        $this->call(LabTestsTableSeeder::class);
        $this->call(LabValuesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(ShippingsTableSeeder::class);
        $this->call(SubRolesTableSeeder::class);
        $this->call(PackageFeesTableSeeder::class);
        $this->call(BannersTableSeeder::class);
        $this->call(JobSkillsTableSeeder::class);
        $this->call(VacanciesTableSeeder::class);
        $this->call(VacancySkillsTableSeeder::class);
        $this->call(EnquiriesTableSeeder::class);
        $this->call(TermConditionsTableSeeder::class);
	$this->call(AppAnalyticsTableSeeder::class);
     	$this->call(AppOpenCountsTableSeeder::class);
        $this->call(VacancyVisitsTableSeeder::class);
        $this->call(VisitorsTableSeeder::class);
    }
}
