<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DmsDatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {                        
        //$this->call(DmsCityTableSeeder::class);
        $this->call(DmsDmsApSupplierTableSeeder::class);
        $this->call(DmsDmsArCustomerTableSeeder::class);
        $this->call(DmsDmsArCustomercategoryTableSeeder::class);
        $this->call(DmsDmsArCustomercategorytypeTableSeeder::class);
        $this->call(DmsDmsArCustomerhierarchyTableSeeder::class);
        $this->call(DmsDmsArCustomerrouteinfoTableSeeder::class);
        $this->call(DmsDmsArDoccustomerTableSeeder::class);
        $this->call(DmsDmsArPaymenttermTableSeeder::class);
        $this->call(DmsDmsArPaymenttypeTableSeeder::class);
        $this->call(DmsDmsArPricesegmentTableSeeder::class);
        $this->call(DmsDmsFinAccountTableSeeder::class);
        $this->call(DmsDmsFinSubaccountTableSeeder::class);
        $this->call(DmsDmsInvCarrierTableSeeder::class);
        $this->call(DmsDmsInvCarrierdriverTableSeeder::class);
        $this->call(DmsDmsInvCarriervehicleTableSeeder::class);
        $this->call(DmsDmsInvProductTableSeeder::class);
        $this->call(DmsDmsInvProductcategoryTableSeeder::class);
        $this->call(DmsDmsInvProductcategorytypeTableSeeder::class);
        $this->call(DmsDmsInvProductitemcategoryTableSeeder::class);
        $this->call(DmsDmsInvProductkitinfoTableSeeder::class);
        $this->call(DmsDmsInvUomTableSeeder::class);
        $this->call(DmsDmsInvVehicleTableSeeder::class);
        $this->call(DmsDmsInvVehicletypeTableSeeder::class);
        $this->call(DmsDmsInvWarehouseTableSeeder::class);
        $this->call(DmsDmsSdPricecatalogTableSeeder::class);
        $this->call(DmsDmsSdRouteTableSeeder::class);
        $this->call(DmsDmsSdRouteitemTableSeeder::class);        
    }
}
