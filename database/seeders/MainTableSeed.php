<?php

namespace Database\Seeders;

use App\Models\Mainhero;
use App\Models\Team;
use Illuminate\Database\Seeder;

class MainTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $main = new Mainhero();
        $main->navbar = [
            [
                'url' => '',  // You can replace '' with actual route names
                'name' => 'Home',
            ],
            [
                'url' => '',  // Replace '' with actual route names
                'name' => 'Cases',
            ],
            [
                'url' => '',  // Replace '' with actual route names
                'name' => 'Contacts',
            ],
            [
                'url' => '',  // Replace '' with actual route names
                'name' => 'Let`s Talk',
            ],
        ];
        $main->loader_body = [
            'line1'=>'Creative Developer',
            'line2'=>'Developer',
            'line3'=>'Creative',
        ];
        $main->main_heading_1 = [
            ['line1' => 'Creative Developer'],
            ['line2' => 'Creative Developer'],
            ['line3' => 'Creative Developer'],
        ];

        $main->main_heading_2 = [
            ['line1' => 'Art Director'],
            ['line2' => 'Awwwards Jury Member'],
            ['line3' => 'Teammate at Depo'],
        ];

        $main->main_heading_3 = [
            ['line1' => 'Available'],
            ['line2' => 'for'],
            ['line3' => 'Freelance'],
            ['line4' => 'Projects'],
        ];

        $main->main_heading_4 = [
            ['line1' => 'Nominee'],
            ['line2' => 'Designer of the Year ‘23'],
            ['line3' => 'by CSSDA'],
        ];

        $main->main_heading_5 = [
            ['line1' => 'Scroll'],
            ['line2' => 'Down'],
        ];
        $main->hero_video_wrapper= 'st-b-showreel.mp4';
        $main->hero_video_unmute= 'unmute';
        $main->description = '
         <p class="_24">
                            I’m Stas Bondar, a <span>Creative Developer</span> with a passion for bringing ideas to life
                            through design and technology. My journey as a <span>Creative Developer</span> started after
                            a career as a professional athlete. Competing taught me discipline, focus, and how to handle
                            challenges. These are skills I use every day as a <span>Creative Developer</span>. Whether
                            on the tennis court or in web development, precision and attention to detail are key. Every
                            move counts, just like every line of code or design element. When I was a child, I dreamed
                            of becoming an Olympic champion. I also wanted to be a professional cyber sportsman and win
                            an international championship. Gaming has always been a big part of my life. I’ve spent over
                            4,000 hours playing Dota 2, perfecting strategies and learning teamwork. Now, I enjoy
                            exploring immersive worlds like Cyberpunk 2077, where creativity and technology come
                            together in extraordinary ways. I’m also a huge fan of Harry Potter and The Witcher, which
                            inspire me with their rich storytelling and imagination.
                            I’m an open-minded person who thrives on new experiences, meeting people from different
                            walks of life, and traveling the globe. Every new place I visit and every new person I meet
                            broadens my perspective and sparks fresh ideas that I bring into my work as a <span>Creative Developer</span>.
                            One of my dreams is to own a German Shepherd one day, a loyal companion to join me on my
                            adventures.
                            As a <span>Creative Developer</span>, I’ve had the privilege of working with creatives from
                            all over the world, collaborating with individuals and studios alike. I believe the best
                            ideas come from combining diverse perspectives and approaches. Whether it’s brainstorming
                            innovative solutions or refining the smallest details, I love the energy and creativity that
                            comes from teamwork.
                            I channel my determination into creating smooth and engaging digital experiences.
                            Transitioning from an athlete to a <span>Creative Developer</span> felt natural because both
                            fields require adaptability, precision, and a willingness to constantly improve. Like
                            sports, web development is always evolving, presenting new challenges and opportunities.
                            That’s what excites me and motivates me to stay ahead of trends and technologies as a <span>Creative Developer</span>.
                            My love for tennis and Formula 1 also fuels my creativity. There is something amazing about
                            the speed, strategy, and precision of Formula 1, and I bring that same energy to my work as
                            a <span>Creative Developer</span>. Whether it’s crafting a stunning website, coding an
                            interactive feature, or optimizing a digital experience, I approach every project with
                            passion and focus.
                            As a <span>Creative Developer</span>, my goal is to create digital solutions that stand out.
                            I’m passionate about blending creativity with technical skill to design websites that are
                            not only visually stunning but also highly functional. I believe every project has the
                            potential to tell a story, solve a problem, or create an impact. From crafting a compelling
                            narrative through design to optimizing user experience for engagement, I strive to deliver
                            work that exceeds expectations.
                            Being a <span>Creative Developer</span> means more than just writing code or designing
                            interfaces. It’s about solving problems, collaborating with clients, and delivering results
                            that make a difference. I draw on my background as an athlete, where I learned the value of
                            teamwork, resilience, and the drive to keep improving. These traits now shape how I tackle
                            challenges, manage projects, and push boundaries to create something truly impactful.
                            If you’re looking for a <span>Creative Developer</span> who is passionate, open-minded, and
                            committed to excellence, we’re a great match. Let’s bring your ideas to life. Whether you’re
                            an individual or a studio, I’m here to turn your vision into reality, blending creativity
                            and technology to create something extraordinary. Together, we can push the boundaries of
                            what’s possible and create digital experiences that leave a lasting impression.
                        </p>
        ';
        $main->num_text = '214';
        $main->cube_char_1 = [
            ['line1' => 'Nominee'],
            ['line2' => 'Designer'],
            ['line3' => 'of the Year'],
            ['line4' => '’23'],
        ];

        $main->cube_char_2 = [
            ['line1' => 'Won several'],
            ['line2' => 'International'],
            ['line3' => 'Awards'],
            ['line4' => '23'],
        ];


        $main->team_description = 'Get peace of mind knowing that our ad platform comes with top-tier customer care and expert tech support ensuring a smooth and hassle-free experience with our ad platform.';



        $main->drop_me_heading1 = 'Drop me';
        $main->drop_me_heading2 = 'a line:';
        $main->drop_me_links = [
            [
                'url'=>'https://t.me/stabondar',
                'name'=>'Telegram',
            ],
            [
                'url'=>'https://wa.me/380731910491',
                'name'=>'WhatsApp',
            ],
        ];
        $main->copy_heading = 'copy:';
        $main->copy_links = [
            [
                'url'=>'',
                'name'=>'hey@stabondar.com',
            ],
        ];

        $main->social_media_heading1 = 'Social';
        $main->social_media_heading2 = 'Media:';
        $main->social_media_links = [
            [
                'url'=>'https://www.awwwards.com/stabondar/',
                'name'=>'Awwwards',
            ],
            [
                'url'=>'https://www.linkedin.com/in/stabondar/',
                'name'=>'LinkedIn',
            ],
            [
                'url'=>'https://x.com/stabondar',
                'name'=>'X | Twitter',
            ],
        ];

        $main->stas_bondar = 'Stas Bondar';
        $main->year = '2025';
        $main->privacy_policy_url = '';
        $main->privacy_policy = 'Privacy Policy';
        $main->awward_title = 'awwwards';
        $main->awward_list = [
            [
                'line1'=>'stabondar 3.0 | feb ‘25',
                'line2'=>'sotd',
            ],
            [
                'line1'=>'significo | may ‘24',
                'line2'=>'dev award',
            ],
            [
                'line1'=>'significo | may ‘24',
                'line2'=>'sotd',
            ],
            [
                'line1'=>'depo studio | oct ‘23',
                'line2'=>'dev award',
            ],
            [
                'line1'=>'depo studio | oct ‘23',
                'line2'=>'sotd',
            ],
            [
                'line1'=>'a. mcguire portfolio | feb ‘23',
                'line2'=>'dev award',
            ],
            [
                'line1'=>'a. mcguire portfolio | feb ‘23',
                'line2'=>'sotd',
            ],
            [
                'line1'=>'orb space | sep ‘22',
                'line2'=>'dev award',
            ],
            [
                'line1'=>'orb space | sep ‘22',
                'line2'=>'sotd',
            ],
            [
                'line1'=>'stabondar 1.0 | apr ‘22',
                'line2'=>'dev award',
            ],
            [
                'line1'=>'stabondar 1.0 | apr ‘22',
                'line2'=>'sotd',
            ],
            [
                'line1'=>'dima kutsenko | oct ‘21',
                'line2'=>'dev award',
            ],
            [
                'line1'=>'dima kutsenko | oct ‘21',
                'line2'=>'sotd',
            ],
        ];

        $main->css_design_title = 'css design awards';
        $main->css_design_list = [
            [
                'line1'=>'function health | sep ‘24',
                'line2'=>'wotd',
            ],
            [
                'line1'=>'depo studio | oct ‘23',
                'line2'=>'wotd',
            ],
            [
                'line1'=>'stabondar 2.0 | jun ‘23<',
                'line2'=>'wotd',
            ],
            [
                'line1'=>'a. mcguire portfolio | feb ‘23',
                'line2'=>'wotd',
            ],
            [
                'line1'=>'orb space | sep ‘22',
                'line2'=>'wotd',
            ],
            [
                'line1'=>'stabondar 1.0 | apr ‘22',
                'line2'=>'wotd',
            ],
            [
                'line1'=>'dima kutsenko | oct ‘21',
                'line2'=>'wotd',
            ],
        ];

        $main->the_fwa_title = 'the fwa';
        $main->the_fwa_list = [
            [
              'line1' =>'stabondar 3.0 | feb ‘25',
              'line2' =>'fotd',
            ],
            [
              'line1' =>'depo studio | oct ‘23',
              'line2' =>'fotd',
            ],
            [
              'line1' =>'orb space | sep ‘22',
              'line2' =>'fotd',
            ],
        ];


        $main->save();



    }


}
