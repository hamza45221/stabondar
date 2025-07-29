<?php

namespace Database\Seeders;

use App\Models\Cases;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CaseTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogs = [
            [
                'category_id' => '',
                'site_award_heading_1' => 'Site of the Day',
                'site_award_heading_2' => 'by Awwwards',
                'web_day_heading_1' => 'Website of the Day',
                'web_day_heading_2' => 'by CSS',
                'web_day_heading_3' => 'Design Awards',
                'fwa_heading_1' => 'FWA',
                'fwa_heading_2' => 'of the day',
                'studio_heading_1' => 'Digital Studio',
                'studio_heading_2' => 'website',
                'depo_studio' => 'Depo Studio',
                'hero_image' => '/images/depo/main.webp',

                'case_nav_name' =>'Depo Studio',
                'case_nav_section' =>'Home page',
                'case_nav_footer' =>'Visit Live Site',
                'depo_suquence_hero_image' =>'/_astro/Item 01.BBYPfXL5.png',
                'depo_sequence_banner_content' =>'Our mission is creating world-class websites where beauty meets sales prowess.
                                    Why not to have both?',

                'home_sec_images1' => '/_astro/Item 02.CuVfKpgV.png',
                'home_sec_images2' => '/_astro/Item 03.BBEM4OUP.png',

                'home_page_images1' => '/_astro/Item 04.CJIt6T5S.webp',
                'home_page_images2' => '/_astro/Item 05.C38x99a7.png',
                'home_page_video' => 'video.m3u8',

                'case_image1' => '/_astro/Item 07.CAPq2iIi.png',
                'case_image2' => '/_astro/Item 08.CoDuYzdB.png',
                'case_image3' => '/_astro/Item 09.Bbu6EhMK.webp',
                'case_image4' => '/_astro/Item 10.BN4W3hnH.png',
                'case_image5' => '/_astro/Item 11.DvJ4TERn.webp',
                'case_video' => 'https://customer-bxnymfcijxht3x73.cloudflarestream.com/4e51007a7d9664dc98d31566198903d1/manifest/video.m3u8',
                'case_image6' => '/_astro/Item 11.DvJ4TERn.webp',
                'case_image7' => '/_astro/Item 12.BucVJLVa.png',
                'case_image8' => '/_astro/Item 14.Cv7x6EHL.png',
                'case_vide2' => 'https://customer-bxnymfcijxht3x73.cloudflarestream.com/10f26782d438342eaabddb8279952bb5/manifest/video.m3u8',

                'contact_img1' => '/_astro/Item 15.CGBNrj-6.png',
                'contact_img2' => '/_astro/Item 16.30FS1xAs.png',
                'contact_img3' => 'https://customer-bxnymfcijxht3x73.cloudflarestream.com/de0f0698d7459a526df46ada859b456f/manifest/video.m3u8',
                'footer_image' => '/images/dima/footer.webp',
                'footer_thumb' => '/images/dima/main.webp',
                'footer_text' => 'Next Project',
                'footer_fixed_img' => '/images/dima/main.webp',
                'footer_fixed_text' => 'Next Project',

            ],
            [
                'category_id' => '',
                'site_award_heading_1' => 'Site of the Day',
                'site_award_heading_2' => 'by Awwwards',
                'web_day_heading_1' => 'Website of the Day',
                'web_day_heading_2' => 'by CSS',
                'web_day_heading_3' => 'Design Awards',
                'fwa_heading_1' => 'FWA',
                'fwa_heading_2' => 'of the day',
                'studio_heading_1' => 'Digital Studio',
                'studio_heading_2' => 'website',
                'depo_studio' => 'Depo Studio',
                'hero_image' => '/images/dima/main.webp',

                'case_nav_name' =>'Depo Studio',
                'case_nav_section' =>'Home page',
                'case_nav_footer' =>'Visit Live Site',
                'depo_suquence_hero_image' =>'/_astro/Item 01.BBYPfXL5.png',
                'depo_sequence_banner_content' =>'Our mission is creating world-class websites where beauty meets sales prowess.
                                    Why not to have both?',

                'home_sec_images1' => '/_astro/Item 02.CuVfKpgV.png',
                'home_sec_images2' => '/_astro/Item 03.BBEM4OUP.png',

                'home_page_images1' => '/_astro/Item 04.CJIt6T5S.webp',
                'home_page_images2' => '/_astro/Item 05.C38x99a7.png',
                'home_page_video' => 'video.m3u8',

                'case_image1' => '/_astro/Item 07.CAPq2iIi.png',
                'case_image2' => '/_astro/Item 08.CoDuYzdB.png',
                'case_image3' => '/_astro/Item 09.Bbu6EhMK.webp',
                'case_image4' => '/_astro/Item 10.BN4W3hnH.png',
                'case_image5' => '/_astro/Item 11.DvJ4TERn.webp',
                'case_video' => 'https://customer-bxnymfcijxht3x73.cloudflarestream.com/4e51007a7d9664dc98d31566198903d1/manifest/video.m3u8',
                'case_image6' => '/_astro/Item 11.DvJ4TERn.webp',
                'case_image7' => '/_astro/Item 12.BucVJLVa.png',
                'case_image8' => '/_astro/Item 14.Cv7x6EHL.png',
                'case_vide2' => 'https://customer-bxnymfcijxht3x73.cloudflarestream.com/10f26782d438342eaabddb8279952bb5/manifest/video.m3u8',

                'contact_img1' => '/_astro/Item 15.CGBNrj-6.png',
                'contact_img2' => '/_astro/Item 16.30FS1xAs.png',
                'contact_img3' => 'https://customer-bxnymfcijxht3x73.cloudflarestream.com/de0f0698d7459a526df46ada859b456f/manifest/video.m3u8',
                'footer_image' => '/_astro/Item 16.30FS1xAs.png',
                'footer_thumb' => '/images/dima/main.webp',
                'footer_text' => 'Next Project',
                'footer_fixed_img' => '/images/dima/main.webp',
                'footer_fixed_text' => 'Next Project',

            ],
            [
                'category_id' => '',
                'site_award_heading_1' => 'Site of the Day',
                'site_award_heading_2' => 'by Awwwards',
                'web_day_heading_1' => 'Website of the Day',
                'web_day_heading_2' => 'by CSS',
                'web_day_heading_3' => 'Design Awards',
                'fwa_heading_1' => 'FWA',
                'fwa_heading_2' => 'of the day',
                'studio_heading_1' => 'Digital Studio',
                'studio_heading_2' => 'website',
                'depo_studio' => 'Depo Studio',
                'hero_image' => '/images/orb/main.webp',

                'case_nav_name' =>'Depo Studio',
                'case_nav_section' =>'Home page',
                'case_nav_footer' =>'Visit Live Site',
                'depo_suquence_hero_image' =>'/_astro/Item 01.BBYPfXL5.png',
                'depo_sequence_banner_content' =>'Our mission is creating world-class websites where beauty meets sales prowess.
                                    Why not to have both?',

                'home_sec_images1' => '/_astro/Item 02.CuVfKpgV.png',
                'home_sec_images2' => '/_astro/Item 03.BBEM4OUP.png',

                'home_page_images1' => '/_astro/Item 04.CJIt6T5S.webp',
                'home_page_images2' => '/_astro/Item 05.C38x99a7.png',
                'home_page_video' => 'video.m3u8',

                'case_image1' => '/_astro/Item 07.CAPq2iIi.png',
                'case_image2' => '/_astro/Item 08.CoDuYzdB.png',
                'case_image3' => '/_astro/Item 09.Bbu6EhMK.webp',
                'case_image4' => '/_astro/Item 10.BN4W3hnH.png',
                'case_image5' => '/_astro/Item 11.DvJ4TERn.webp',
                'case_video' => 'https://customer-bxnymfcijxht3x73.cloudflarestream.com/4e51007a7d9664dc98d31566198903d1/manifest/video.m3u8',
                'case_image6' => '/_astro/Item 11.DvJ4TERn.webp',
                'case_image7' => '/_astro/Item 12.BucVJLVa.png',
                'case_image8' => '/_astro/Item 14.Cv7x6EHL.png',
                'case_vide2' => 'https://customer-bxnymfcijxht3x73.cloudflarestream.com/10f26782d438342eaabddb8279952bb5/manifest/video.m3u8',

                'contact_img1' => '/_astro/Item 15.CGBNrj-6.png',
                'contact_img2' => '/_astro/Item 16.30FS1xAs.png',
                'contact_img3' => 'https://customer-bxnymfcijxht3x73.cloudflarestream.com/de0f0698d7459a526df46ada859b456f/manifest/video.m3u8',
                'footer_image' => '/_astro/Item 16.30FS1xAs.png',
                'footer_thumb' => '/images/dima/main.webp',
                'footer_text' => 'Next Project',
                'footer_fixed_img' => '/images/dima/main.webp',
                'footer_fixed_text' => 'Next Project',

            ],
            [
                'category_id' => '',
                'site_award_heading_1' => 'Site of the Day',
                'site_award_heading_2' => 'by Awwwards',
                'web_day_heading_1' => 'Website of the Day',
                'web_day_heading_2' => 'by CSS',
                'web_day_heading_3' => 'Design Awards',
                'fwa_heading_1' => 'FWA',
                'fwa_heading_2' => 'of the day',
                'studio_heading_1' => 'Digital Studio',
                'studio_heading_2' => 'website',
                'depo_studio' => 'Depo Studio',
                'hero_image' => '/images/terrane/main.webp',

                'case_nav_name' =>'Depo Studio',
                'case_nav_section' =>'Home page',
                'case_nav_footer' =>'Visit Live Site',
                'depo_suquence_hero_image' =>'/_astro/Item 01.BBYPfXL5.png',
                'depo_sequence_banner_content' =>'Our mission is creating world-class websites where beauty meets sales prowess.
                                    Why not to have both?',

                'home_sec_images1' => '/_astro/Item 02.CuVfKpgV.png',
                'home_sec_images2' => '/_astro/Item 03.BBEM4OUP.png',

                'home_page_images1' => '/_astro/Item 04.CJIt6T5S.webp',
                'home_page_images2' => '/_astro/Item 05.C38x99a7.png',
                'home_page_video' => 'video.m3u8',

                'case_image1' => '/_astro/Item 07.CAPq2iIi.png',
                'case_image2' => '/_astro/Item 08.CoDuYzdB.png',
                'case_image3' => '/_astro/Item 09.Bbu6EhMK.webp',
                'case_image4' => '/_astro/Item 10.BN4W3hnH.png',
                'case_image5' => '/_astro/Item 11.DvJ4TERn.webp',
                'case_video' => 'https://customer-bxnymfcijxht3x73.cloudflarestream.com/4e51007a7d9664dc98d31566198903d1/manifest/video.m3u8',
                'case_image6' => '/_astro/Item 11.DvJ4TERn.webp',
                'case_image7' => '/_astro/Item 12.BucVJLVa.png',
                'case_image8' => '/_astro/Item 14.Cv7x6EHL.png',
                'case_vide2' => 'https://customer-bxnymfcijxht3x73.cloudflarestream.com/10f26782d438342eaabddb8279952bb5/manifest/video.m3u8',

                'contact_img1' => '/_astro/Item 15.CGBNrj-6.png',
                'contact_img2' => '/_astro/Item 16.30FS1xAs.png',
                'contact_img3' => 'https://customer-bxnymfcijxht3x73.cloudflarestream.com/de0f0698d7459a526df46ada859b456f/manifest/video.m3u8',
                'footer_image' => '/_astro/Item 16.30FS1xAs.png',
                'footer_thumb' => '/images/dima/main.webp',
                'footer_text' => 'Next Project',
                'footer_fixed_img' => '/images/dima/main.webp',
                'footer_fixed_text' => 'Next Project',

            ],
            [
                'category_id' => '',
                'site_award_heading_1' => 'Site of the Day',
                'site_award_heading_2' => 'by Awwwards',
                'web_day_heading_1' => 'Website of the Day',
                'web_day_heading_2' => 'by CSS',
                'web_day_heading_3' => 'Design Awards',
                'fwa_heading_1' => 'FWA',
                'fwa_heading_2' => 'of the day',
                'studio_heading_1' => 'Digital Studio',
                'studio_heading_2' => 'website',
                'depo_studio' => 'Depo Studio',
                'hero_image' => '/images/depo/main.webp',

                'case_nav_name' =>'Depo Studio',
                'case_nav_section' =>'Home page',
                'case_nav_footer' =>'Visit Live Site',
                'depo_suquence_hero_image' =>'/_astro/Item 01.BBYPfXL5.png',
                'depo_sequence_banner_content' =>'Our mission is creating world-class websites where beauty meets sales prowess.
                                    Why not to have both?',

                'home_sec_images1' => '/_astro/Item 02.CuVfKpgV.png',
                'home_sec_images2' => '/_astro/Item 03.BBEM4OUP.png',

                'home_page_images1' => '/_astro/Item 04.CJIt6T5S.webp',
                'home_page_images2' => '/_astro/Item 05.C38x99a7.png',
                'home_page_video' => 'video.m3u8',

                'case_image1' => '/_astro/Item 07.CAPq2iIi.png',
                'case_image2' => '/_astro/Item 08.CoDuYzdB.png',
                'case_image3' => '/_astro/Item 09.Bbu6EhMK.webp',
                'case_image4' => '/_astro/Item 10.BN4W3hnH.png',
                'case_image5' => '/_astro/Item 11.DvJ4TERn.webp',
                'case_video' => 'https://customer-bxnymfcijxht3x73.cloudflarestream.com/4e51007a7d9664dc98d31566198903d1/manifest/video.m3u8',
                'case_image6' => '/_astro/Item 11.DvJ4TERn.webp',
                'case_image7' => '/_astro/Item 12.BucVJLVa.png',
                'case_image8' => '/_astro/Item 14.Cv7x6EHL.png',
                'case_vide2' => 'https://customer-bxnymfcijxht3x73.cloudflarestream.com/10f26782d438342eaabddb8279952bb5/manifest/video.m3u8',

                'contact_img1' => '/_astro/Item 15.CGBNrj-6.png',
                'contact_img2' => '/_astro/Item 16.30FS1xAs.png',
                'contact_img3' => 'https://customer-bxnymfcijxht3x73.cloudflarestream.com/de0f0698d7459a526df46ada859b456f/manifest/video.m3u8',
                'footer_image' => '/_astro/Item 16.30FS1xAs.png',
                'footer_thumb' => '/images/dima/main.webp',
                'footer_text' => 'Next Project',
                'footer_fixed_img' => '/images/dima/main.webp',
                'footer_fixed_text' => 'Next Project',

            ],
            [
                'category_id' => '',
                'site_award_heading_1' => 'Site of the Day',
                'site_award_heading_2' => 'by Awwwards',
                'web_day_heading_1' => 'Website of the Day',
                'web_day_heading_2' => 'by CSS',
                'web_day_heading_3' => 'Design Awards',
                'fwa_heading_1' => 'FWA',
                'fwa_heading_2' => 'of the day',
                'studio_heading_1' => 'Digital Studio',
                'studio_heading_2' => 'website',
                'depo_studio' => 'Depo Studio',
                'hero_image' => '/images/dima/main.webp',

                'case_nav_name' =>'Depo Studio',
                'case_nav_section' =>'Home page',
                'case_nav_footer' =>'Visit Live Site',
                'depo_suquence_hero_image' =>'/_astro/Item 01.BBYPfXL5.png',
                'depo_sequence_banner_content' =>'Our mission is creating world-class websites where beauty meets sales prowess.
                                    Why not to have both?',

                'home_sec_images1' => '/_astro/Item 02.CuVfKpgV.png',
                'home_sec_images2' => '/_astro/Item 03.BBEM4OUP.png',

                'home_page_images1' => '/_astro/Item 04.CJIt6T5S.webp',
                'home_page_images2' => '/_astro/Item 05.C38x99a7.png',
                'home_page_video' => 'video.m3u8',

                'case_image1' => '/_astro/Item 07.CAPq2iIi.png',
                'case_image2' => '/_astro/Item 08.CoDuYzdB.png',
                'case_image3' => '/_astro/Item 09.Bbu6EhMK.webp',
                'case_image4' => '/_astro/Item 10.BN4W3hnH.png',
                'case_image5' => '/_astro/Item 11.DvJ4TERn.webp',
                'case_video' => 'https://customer-bxnymfcijxht3x73.cloudflarestream.com/4e51007a7d9664dc98d31566198903d1/manifest/video.m3u8',
                'case_image6' => '/_astro/Item 11.DvJ4TERn.webp',
                'case_image7' => '/_astro/Item 12.BucVJLVa.png',
                'case_image8' => '/_astro/Item 14.Cv7x6EHL.png',
                'case_vide2' => 'https://customer-bxnymfcijxht3x73.cloudflarestream.com/10f26782d438342eaabddb8279952bb5/manifest/video.m3u8',

                'contact_img1' => '/_astro/Item 15.CGBNrj-6.png',
                'contact_img2' => '/_astro/Item 16.30FS1xAs.png',
                'contact_img3' => 'https://customer-bxnymfcijxht3x73.cloudflarestream.com/de0f0698d7459a526df46ada859b456f/manifest/video.m3u8',
                'footer_image' => '/_astro/Item 16.30FS1xAs.png',
                'footer_thumb' => '/images/dima/main.webp',
                'footer_text' => 'Next Project',
                'footer_fixed_img' => '/images/dima/main.webp',
                'footer_fixed_text' => 'Next Project',

            ],
            [
                'category_id' => '',
                'site_award_heading_1' => 'Site of the Day',
                'site_award_heading_2' => 'by Awwwards',
                'web_day_heading_1' => 'Website of the Day',
                'web_day_heading_2' => 'by CSS',
                'web_day_heading_3' => 'Design Awards',
                'fwa_heading_1' => 'FWA',
                'fwa_heading_2' => 'of the day',
                'studio_heading_1' => 'Digital Studio',
                'studio_heading_2' => 'website',
                'depo_studio' => 'Depo Studio',
                'hero_image' => '/images/orb/main.webp',

                'case_nav_name' =>'Depo Studio',
                'case_nav_section' =>'Home page',
                'case_nav_footer' =>'Visit Live Site',
                'depo_suquence_hero_image' =>'/_astro/Item 01.BBYPfXL5.png',
                'depo_sequence_banner_content' =>'Our mission is creating world-class websites where beauty meets sales prowess.
                                    Why not to have both?',

                'home_sec_images1' => '/_astro/Item 02.CuVfKpgV.png',
                'home_sec_images2' => '/_astro/Item 03.BBEM4OUP.png',

                'home_page_images1' => '/_astro/Item 04.CJIt6T5S.webp',
                'home_page_images2' => '/_astro/Item 05.C38x99a7.png',
                'home_page_video' => 'video.m3u8',

                'case_image1' => '/_astro/Item 07.CAPq2iIi.png',
                'case_image2' => '/_astro/Item 08.CoDuYzdB.png',
                'case_image3' => '/_astro/Item 09.Bbu6EhMK.webp',
                'case_image4' => '/_astro/Item 10.BN4W3hnH.png',
                'case_image5' => '/_astro/Item 11.DvJ4TERn.webp',
                'case_video' => 'https://customer-bxnymfcijxht3x73.cloudflarestream.com/4e51007a7d9664dc98d31566198903d1/manifest/video.m3u8',
                'case_image6' => '/_astro/Item 11.DvJ4TERn.webp',
                'case_image7' => '/_astro/Item 12.BucVJLVa.png',
                'case_image8' => '/_astro/Item 14.Cv7x6EHL.png',
                'case_vide2' => 'https://customer-bxnymfcijxht3x73.cloudflarestream.com/10f26782d438342eaabddb8279952bb5/manifest/video.m3u8',

                'contact_img1' => '/_astro/Item 15.CGBNrj-6.png',
                'contact_img2' => '/_astro/Item 16.30FS1xAs.png',
                'contact_img3' => 'https://customer-bxnymfcijxht3x73.cloudflarestream.com/de0f0698d7459a526df46ada859b456f/manifest/video.m3u8',
                'footer_image' => '/_astro/Item 16.30FS1xAs.png',
                'footer_thumb' => '/images/dima/main.webp',
                'footer_text' => 'Next Project',
                'footer_fixed_img' => '/images/dima/main.webp',
                'footer_fixed_text' => 'Next Project',

            ],
            [
                'category_id' => '',
                'site_award_heading_1' => 'Site of the Day',
                'site_award_heading_2' => 'by Awwwards',
                'web_day_heading_1' => 'Website of the Day',
                'web_day_heading_2' => 'by CSS',
                'web_day_heading_3' => 'Design Awards',
                'fwa_heading_1' => 'FWA',
                'fwa_heading_2' => 'of the day',
                'studio_heading_1' => 'Digital Studio',
                'studio_heading_2' => 'website',
                'depo_studio' => 'Depo Studio',
                'hero_image' => '/images/terrane/main.webp',

                'case_nav_name' =>'Depo Studio',
                'case_nav_section' =>'Home page',
                'case_nav_footer' =>'Visit Live Site',
                'depo_suquence_hero_image' =>'/_astro/Item 01.BBYPfXL5.png',
                'depo_sequence_banner_content' =>'Our mission is creating world-class websites where beauty meets sales prowess.
                                    Why not to have both?',

                'home_sec_images1' => '/_astro/Item 02.CuVfKpgV.png',
                'home_sec_images2' => '/_astro/Item 03.BBEM4OUP.png',

                'home_page_images1' => '/_astro/Item 04.CJIt6T5S.webp',
                'home_page_images2' => '/_astro/Item 05.C38x99a7.png',
                'home_page_video' => 'video.m3u8',

                'case_image1' => '/_astro/Item 07.CAPq2iIi.png',
                'case_image2' => '/_astro/Item 08.CoDuYzdB.png',
                'case_image3' => '/_astro/Item 09.Bbu6EhMK.webp',
                'case_image4' => '/_astro/Item 10.BN4W3hnH.png',
                'case_image5' => '/_astro/Item 11.DvJ4TERn.webp',
                'case_video' => 'https://customer-bxnymfcijxht3x73.cloudflarestream.com/4e51007a7d9664dc98d31566198903d1/manifest/video.m3u8',
                'case_image6' => '/_astro/Item 11.DvJ4TERn.webp',
                'case_image7' => '/_astro/Item 12.BucVJLVa.png',
                'case_image8' => '/_astro/Item 14.Cv7x6EHL.png',
                'case_vide2' => 'https://customer-bxnymfcijxht3x73.cloudflarestream.com/10f26782d438342eaabddb8279952bb5/manifest/video.m3u8',

                'contact_img1' => '/_astro/Item 15.CGBNrj-6.png',
                'contact_img2' => '/_astro/Item 16.30FS1xAs.png',
                'contact_img3' => 'https://customer-bxnymfcijxht3x73.cloudflarestream.com/de0f0698d7459a526df46ada859b456f/manifest/video.m3u8',
                'footer_image' => '/_astro/Item 16.30FS1xAs.png',
                'footer_thumb' => '/images/dima/main.webp',
                'footer_text' => 'Next Project',
                'footer_fixed_img' => '/images/dima/main.webp',
                'footer_fixed_text' => 'Next Project',

            ],



        ];

        foreach ($blogs as $blogData) {
            Cases::create($blogData);
        }
    }
}
