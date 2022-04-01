<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classicalGuitars = [
            ["22_4.jpg"],
            ["12121_1.jpg"],
            ["asdasdasdasd.jpg"],
            ["vc104.jpg", "vc104_2.jpg", "vc104_3.jpg"]
        ];
        $acousticGuitars = [
            ["yellowstone_mjce_bk.jpg", "yellowstone_mjce_bk_2.jpg", "yellowstone_mjce_sb_2_1_1.jpg"], ["yellowstone_mjce_nt.jpg", "yellowstone_mjce_nt_2.jpg", "yellowstone_mjce_sb_2_1.jpg"], ["yellowstone_mjce_sb.jpg", "yellowstone_mjce_sb_3.jpg", "yellowstone_mjce_sb_2.jpg"]
        ];
        $electricGuitars = [
            ["bobcat-bk-s66-product-1.png", "bobcat-v90-7-1.jpg", "bobcat-v90-8-1.jpg", "bobcat-v90-bk-back-1-1.jpg"], ["rider-std-h_3ts.jpg", "rider-std-h_3ts_2.jpg", "rider-std-h_3ts_3.jpg"],
            ["rider-std-h_bk.jpg", "rider-std-h_bk_2.jpg", "rider-std-h_bk_3.jpg"]
        ];
        $bassGuitars = [
            ["horseman_3ts.jpg", "horseman_3ts_2.jpg", "horseman_3ts_3.jpg"],
            ["horseman_trd.jpg", "horseman_bk_2.jpg", "horseman_bk_3.jpg"],
            ["horseman_trd (1).jpg", "horseman_trd_2.jpg", "horseman_trd_3.jpg"]
        ];
        $guitarStrings = [
            ["1_13_8.jpg"], ["2_22.png"], ["elixir-12002.jpg"]
        ];
        $acousticPianos = [];
        $electricPianos = [
            ["recitalpro_ortho_web.jpg", "recitalpro_voicestyles_web.jpg", "recitalpro_left_web.jpg", "recitalpro_front_web_00.jpg"],
            ["alesis_concert.jpg", "alesis_concert_2.jpg", "alesis_concert_3.jpg", "alesis_concert_4.jpg"],
            ["primus_.jpeg", "jpeg.jpg", "primus3.jpeg", "primus4.jpeg"]
        ];
        $arrangers = [
            ["1pa4x61.jpg", "2pa4x61.jpg", "3pa4x61.jpg", "4pa4x61.jpg"],
            ["1pa4x76.jpg", "3pa4x76.jpg", "2pa4x76.jpg"],
            ["pa_700.jpg", "e153e2a159fbdaa3c5cf306395b8a8e4_pc.png", "c24364d9611bb6a67352a7d64705d57b_pc.png"]
        ];
        $synthesizers = [
            ["korg_ms20fs_7.png", "korg_ms20fs_3.png", "korg_ms20fs_5.png", "korg_ms20fs.png"],
            ["harmony32_ortho_web.jpg", "harmony32_angle_web.jpg", "harmony32_front_web.jpg", "harmony32_rear_web.jpg"],
            ["korg_nts1.png", "korg_nts1_vi.png", "korg_nts1_iii.png", "korg_nts1_ii.png"]
        ];
        $pianoEquipmentsAndOther = [
            ["k_m_21110-300-55.jpg"], ["ds-1h_2.jpg"], ["ec-5_2.jpg"]
        ];
        $acousticDrums = [
            ["voxtelstar2020_3_edited.jpg", "voxtelstar2020_4_edited.jpg", "voxtelstar2020_5_edited.jpg", "voxtelstar2020_7_edited.jpg"]
        ];
        $electricDrums = [
            ["crimsoniimeshkit_ortho_web.jpg", "crimsoniimeshkit_module_back_hires.jpg", "crimsoniimeshkit_module_ortho_web.jpg", "crimsoniimeshkit_module_side_web_1200x750.jpg"],
            ["debut_ortho_web.jpg", "debut_topdown_web.jpg", "debut_detail_web.jpg", "debut_module_web.jpg"],
            ["strike-se_ortho_web.jpg", "strike-se_drummount_web.jpg", "strike-se_kick_web.jpg", "strike-se_cymbal-14_web.jpg"]
        ];
        $percussionDrums = [
            ["51jcshsorxl._sl1200_.jpg", "71-xzioecml._sl1500_.jpg", "81tfy7cy2pl._sl1500_.jpg", "91mgqh4c-il._sl1500_.jpg"],
            ["percpad_ortho_web.png", "percpad_angle_web.png", "alesis_percpad_pad-1.jpg"]
        ];
        $sticks = [
            ["sd-7aw.jpg"], ["10_3.jpg"], ["sd-5an.jpg"]
        ];
        $others = [];
        $ampsForAcousticGuitar = [
            ["3_8_4.jpg", "1_22_3.jpg", "4_8_4.jpg"],
            ["la15c_1.jpg", "la15c_2.jpg"]
        ];
        $ampsForElectricGuitar = [
            ["gc212-e.jpg", "gc212-e_3.jpg", "gc212-e_2.jpg"],
            ["cambridge50.jpg"],
            ["vox_pathfinder10.jpg"]
        ];
        $ampsForBassGuitar = [
            ["red_spark-15.jpg", "red_spark-15_2.jpg", "red_spark-15_4.jpg", "red_spark-15_5.jpg"],
            ["red_spark-30.jpg", "red_spark-30_2.jpg", "red_spark-30_4.jpg", "red_spark-30_5.jpg"],
            ["red_spark-60.jpg", "red_spark-60_2.jpg", "red_spark-60_4.jpg", "red_spark-60_5.jpg"]
        ];
        $controllers = [
            ["prime2-side-topdown-webk_1_1_1_.jpg", "prime-2-features-frontk.png", "prime2.png", "prime-2-features-reark.png"],
            ["numark_mixtrackplatinumfx_ortho_web-624x390.jpg", "numark_mixtrackplatinumfx_angle_front_web-624x390.jpg", "numark_mixtrackplatinumfx_angle_web-624x390.jpg", "numark_mixtrackplatinumfx_front_web-624x390.jpg"],
            ["primego-side-topdown-webk_2.jpg", "prime_go_dopuna.jpg", "primego-side-back-webk_2.jpg", "primego-angle-left-webk_2.jpg"]
        ];
        $gramophones = [
            ["1490202941000_img_773927.jpg", "1490203323000_1327205.jpg", "1490202941000_img_773926.jpg", "1490202941000_img_773928.jpg"],
            ["1484318727000_img_736750.jpg", "1484318739000_1310962.jpg", "1484318727000_img_736751.jpg", "1484318727000_img_736752.jpg"],
            ["plx_1000.jpg", "pioneer-plx-1000.jpg"]
        ];
        $mixers = [
            ["2000nxs.jpg", "djm-2000nexus_2.jpg", "pioneer-djm-2000-nexus_03xxl.jpg"],
            ["scratch_ortho_web.jpg", "scratch_angle_web.jpg", "scratch_rear_web.jpg", "scratch_front_web.jpg"],
            ["seventy_two.jpg", "seventy_two_2.jpg", "seventy_two_3.jpg"],
        ];
        $effects = [
            ["korg_kp3_.jpg"],
            ["pioneer-rmx1000-remix-station.jpg", "3-pioneer-rmx-1000-backside-20120318-230224.jpg"],
            ["rmx-500-main.jpg", "rmx-500-side.jpg", "rmx-500-angle.jpg"]
        ];
        $mediaPlayers = [
            ["6_m_3.jpg", "denon_dopuna_2.png", "sc6000m-side-front-webk_1_1.jpg", "sc6000m-side-back-webk_1_1.jpg"],
            ["1.sl1500_.jpg", "4._ac_sl1500_.jpg", "5._ac_sl1500_.jpg", "7._ac_sl1500_.jpg"],
            ["sc5000m_3.jpg", "sc5000m_5.jpg", "sc5000m_6.jpg"]
        ];
        $bigArray = [$classicalGuitars, $acousticGuitars, $electricGuitars, $bassGuitars, $guitarStrings, $acousticPianos, $electricPianos, $arrangers, $synthesizers, $pianoEquipmentsAndOther, $acousticDrums, $electricDrums, $percussionDrums, $sticks, $others, $ampsForAcousticGuitar, $ampsForElectricGuitar, $ampsForBassGuitar, $controllers, $gramophones, $mixers, $effects, $mediaPlayers];
        $productID = 1;
        foreach ($bigArray as $sub_category) {
            foreach ($sub_category as $product) {
                foreach ($product as $image) {
                    DB::table("images")->insert([
                        "product_id" => $productID,
                        "src" => $image,
                        "alt" => $image,
                        "created_at" => now()
                    ]);
                }
                $productID++;
            }
        }
    }
}
