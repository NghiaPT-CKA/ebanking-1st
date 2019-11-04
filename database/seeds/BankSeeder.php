<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataInsert = [
            [   'name' => 'Ngân hàng Xây dựng',
                'code' => 'CB',    ],
            [   'name' => 'Ngân hàng Nông nghiệp và Phát triển Nông thôn VN',
                'code' => 'Agribank',    ],
            [   'name' => 'Ngân hàng Tiên Phong',
                'code' => 'TPBank',    ],
            [   'name' => 'Ngân hàng Á Châu',
                'code' => 'ACB',    ],
            [   'name' => 'Ngân hàng Đông Á',
                'code' => 'DAB',    ],
            [   'name' => 'Kỹ Thương Việt Nam',
                'code' => 'TCB',    ],
            [   'name' => 'Việt Nam Thịnh Vượng',
                'code' => 'VPBank',    ],
            [   'name' => 'Phát triển nhà Thành phố Hồ Chí Minh',
                'code' => 'HDBank',    ],
            [   'name' => 'Sài Gòn-Hà Nội',
                'code' => 'SHB',    ],
            [   'name' => 'Sài Gòn Thương Tín',
                'code' => 'STB',    ],
            [   'name' => 'Đầu tư và Phát triển Việt Nam',
                'code' => 'BIDV',    ],
            [   'name' => 'Công Thương Việt Nam',
                'code' => 'CTG',    ],
            [   'name' => 'Ngoại thương Việt Nam',
                'code' => 'VCB',    ],
            [   'name' => 'Xuất Nhập khẩu Việt Nam',
                'code' => 'EIB',    ],
        ];
        return DB::table('banks')->insert($dataInsert);
    }
}
