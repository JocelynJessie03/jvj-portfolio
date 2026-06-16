<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class PortfolioController extends Controller
{
    public function index()
    {
        $skills = [
            ['name' => 'Leadership',     'percent' => 95, 'icon' => '👑'],
            ['name' => 'Problem Solving','percent' => 90, 'icon' => '🧩'],
            ['name' => 'Java',           'percent' => 85, 'icon' => '☕'],
            ['name' => 'MySQL',          'percent' => 85, 'icon' => '🗄️'],
            ['name' => 'HTML & CSS',     'percent' => 80, 'icon' => '🌐'],
        ];

        $projects = [
            [
                'title'       => 'From Broole Website Application',
                'description' => 'A Laravel-based e-commerce platform designed for UMKM From Broole, integrating online sales, inventory management, POS functionality, and AI-powered customer support into a unified business solution.',
                'tags'        => ['E-Commerce', 'POS System', 'UMKM'],
                'image'       => 'FromBroole-project.png',
                'logo'        => 'FromBroole-logo.png',
            ],
            [
                'title'       => 'EaseeAI',
                'description' => 'A web extension designed to improve reading accessibility for users with dyslexia, featuring tools like font and background customization, reading ruler, magnifier, and AI-powered text highlighting, text-to-speech, and text-to-image.',
                'tags'        => ['Accessibility', 'AI', 'Web Extension', 'Dyslexia'],
                'image'       => 'EaseeAI-project.png',
                'logo'        => 'EaseeAI-logo.png',
            ],
            [
                'title'       => 'Cinesquare',
                'description' => 'A cinema management system designed for staff and supervisors to handle daily operations efficiently. Includes managing movies, studios, customers, snack bar menus, ticket booking, transaction monitoring, and food order handling.',
                'tags'        => ['Cinema', 'Management System', 'POS'],
                'image'       => 'Cinesquare-project.png',
                'logo'        => 'Cinesquare-logo.png',
            ],
            [
                'title'       => 'TaskWave',
                'description' => 'An advanced task management application that helps users prioritize and organize their tasks using the Eisenhower Matrix, providing a more structured and efficient approach to productivity.',
                'tags'        => ['Task Management', 'Eisenhower Matrix', 'Productivity'],
                'image'       => 'TaskWave-project.png',
                'logo'        => 'TaskWave-logo.png',
            ],
            [
                'title'       => 'Gemadi',
                'description' => 'A tourism platform designed to help both local and international travelers discover destinations across Indonesia. Collaborates with local businesses (UMKM) and features GemaBooks, an audio tour experience for travelers exploring without a tour guide.',
                'tags'        => ['Tourism', 'UMKM', 'Audio Tour'],
                'image'       => 'Gemadi-project.png',
                'logo'        => 'Gemadi-logo.png',
            ],
            [
                'title'       => 'SnailList',
                'description' => 'A productivity app based on the Eisenhower Matrix, enhanced with gamification. Users complete tasks to earn points, which can be used to customize their virtual pet snail—making productivity more engaging and rewarding.',
                'tags'        => ['Productivity', 'Gamification', 'Eisenhower Matrix'],
                'image'       => 'SnailList-project.png',
                'logo'        => 'SnailList-logo.png',
            ],
        ];

        return view('portfolio.index', compact('skills', 'projects'));
    }

    public function projects()
    {
        $projects = [
            [
                'title'       => 'From Broole Website Application',
                'description' => 'An e-commerce platform for UMKM by Broole that integrates online storefront and in-store operations through a POS system, inventory management, and order tracking. I contributed to feature ideation, UI/UX design, frontend and backend development, and system logic implementation, helping deliver a scalable Laravel-based solution with Google SSO and AI chatbot integration.',
                'tags'        => ['E-Commerce', 'POS System', 'UMKM'],
                'details'     => 'Built to digitalize UMKM From Broole, this platform unifies online storefront and in-store operations under one seamless system for efficient business management.',
                'image'       => 'FromBroole-project.png',
                'logo'        => 'FromBroole-logo.png',
            ],
            [
                'title'       => 'EaseeAI',
                'description' => 'A web extension designed to improve reading accessibility for users with dyslexia through AI-powered features such as text highlighting, text-to-speech, text-to-image, and customizable reading tools. I led the product ideation, feature making, and creating the UI/UX design to create a more personalized and accessible reading experience.',
                'tags'        => ['Accessibility', 'AI', 'Web Extension', 'Dyslexia'],
                'details'     => 'EaseeAI empowers users with dyslexia to browse the web more comfortably through a suite of AI-driven tools that adapt content to individual reading needs.',
                'image'       => 'EaseeAI-project.png',
                'logo'        => 'EaseeAI-logo.png',
            ],
            [
                'title'       => 'Cinesquare',
                'description' => 'A cinema management system that streamlines movie scheduling, ticket booking, customer management, transaction monitoring, and snack bar operations. I led product ideation, feature creation, supervision, and UI/UX design to create an efficient and user-friendly operational workflow.',
                'tags'        => ['Cinema', 'Management System', 'POS'],
                'details'     => 'Cinesquare streamlines every aspect of cinema operations — from scheduling screenings to processing snack bar orders — in one integrated platform.',
                'image'       => 'Cinesquare-project.png',
                'logo'        => 'Cinesquare-logo.png',
            ],
            [
                'title'       => 'TaskWave',
                'description' => 'A task management application that utilizes the Eisenhower Matrix to help users prioritize and organize tasks more effectively. I initiated the product concept, designed key features, and developed the UI/UX to create a structured and intuitive productivity experience.',
                'tags'        => ['Task Management', 'Eisenhower Matrix', 'Productivity'],
                'details'     => 'TaskWave gives users a clear visual framework to separate urgent from important tasks, reducing overwhelm and improving daily focus and output.',
                'image'       => 'TaskWave-project.png',
                'logo'        => 'TaskWave-logo.png',
            ],
            [
                'title'       => 'Gemadi',
                'description' => 'A tourism platform that helps local and international travelers discover destinations across Indonesia while supporting local UMKM through digital exposure and GemaBooks audio-guided travel experiences. I contributed to the product ideation and feature development process, focusing on improving accessibility and travel engagement',
                'tags'        => ['Tourism', 'UMKM', 'Audio Tour'],
                'details'     => 'Gemadi bridges travelers and local Indonesian communities, empowering UMKM while enriching the travel experience through immersive audio storytelling via GemaBooks.',
                'image'       => 'Gemadi-project.png',
                'logo'        => 'Gemadi-logo.png',
            ],
            [
                'title'       => 'SnailList',
                'description' => 'A gamified productivity application that combines the Eisenhower Matrix with a virtual pet reward system, encouraging users to stay productive through interactive task management. I contributed to feature development and implementation while collaborating with team members to enhance the overall user experience.',
                'tags'        => ['Productivity', 'Gamification', 'Eisenhower Matrix'],
                'details'     => 'SnailList combines focus and fun by letting users manage tasks through priority quadrants while earning rewards for their virtual snail companion.',
                'image'       => 'SnailList-project.png',
                'logo'        => 'SnailList-logo.png',
            ],
        ];

        return view('portfolio.projects', compact('projects'));
    }

    public function contact(Request $request)
    {
    $validator = Validator::make($request->all(), [
    'first_name' => 'required|string|max:100',
    'last_name'  => 'required|string|max:100',
    'email'      => 'required|email|max:200',
    'message'    => 'nullable|string|max:2000',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    Mail::html(
        "
        <h2>New Portfolio Contact</h2>
        <p><strong>Name:</strong> {$request->first_name} {$request->last_name}</p>
        <p><strong>Email:</strong> {$request->email}</p>
        <p><strong>Message:</strong></p>
        <p>{$request->message}</p>
        ",
        function ($message) {
            $message->to('jessie.liem3@gmail.com')
                    ->subject('New Portfolio Contact Form');
        }
    );

    return back()->with(
        'success',
        'Thank you! Your message has been received. I will get back to you soon.'
    );

    }


    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'       => 'required|email|max:200',
            'collaborate' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        return back()->with('subscribed', 'You are now connected! I will reach out soon.');
    }
}
