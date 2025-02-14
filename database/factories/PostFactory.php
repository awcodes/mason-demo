<?php

namespace Database\Factories;

use App\Models\Post;
use Awcodes\Mason\Support\Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'content' => Faker::make()
                ->brick(
                    identifier: 'section',
                    path: 'mason::bricks.section',
                    values: [
                        'background_color' => 'white',
                        'image' => null,
                        'image_position' => 'start',
                        'image_alignment' => 'top',
                        'image_flush' => false,
                        'image_rounded' => false,
                        'image_shadow' => false,
                        'text' => '<h2>' . $this->faker->sentence() . '</h2><p>' . $this->faker->paragraph() . '</p><p>' . $this->faker->paragraph() . '</p><p>' . $this->faker->paragraph() . '</p>',
                    ]
                )
                ->brick(
                    identifier: 'section',
                    path: 'mason::bricks.section',
                    values: [
                        'background_color' => 'gray',
                        'image' => null,
                        'image_position' => 'start',
                        'image_alignment' => 'top',
                        'image_flush' => false,
                        'image_rounded' => false,
                        'image_shadow' => false,
                        'text' => '<h2>' . $this->faker->sentence() . '</h2><p>' . $this->faker->paragraph() . '</p><p>' . $this->faker->paragraph() . '</p><p>' . $this->faker->paragraph() . '</p>',
                    ]
                )
                ->brick(
                    identifier: 'section',
                    path: 'mason::bricks.section',
                    values: [
                        'background_color' => 'white',
                        'image' => null,
                        'image_position' => 'start',
                        'image_alignment' => 'top',
                        'image_flush' => false,
                        'image_rounded' => false,
                        'image_shadow' => false,
                        'text' => '<h2>' . $this->faker->sentence() . '</h2><p>' . $this->faker->paragraph() . '</p><p>' . $this->faker->paragraph() . '</p><p>' . $this->faker->paragraph() . '</p>',
                    ]
                )
                ->asJson(),
        ];
    }

    public function homePage(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'content' => Faker::make()
                    ->brick(
                        identifier: 'newsletter_signup',
                        path: 'mason.newsletter-signup',
                        values: [
                            'background_color' => 'primary',
                            'heading' => 'Want product news and updates? Sign up for our newsletter.',
                        ]
                    )
                    ->brick(
                        identifier: 'section',
                        path: 'mason::bricks.section',
                        values: [
                            'background_color' => 'white',
                            'image' => null,
                            'image_position' => 'start',
                            'image_alignment' => 'top',
                            'image_flush' => false,
                            'image_rounded' => false,
                            'image_shadow' => false,
                            'text' => '<h2>' . $this->faker->sentence() . '</h2><p>' . $this->faker->paragraph() . '</p><p>' . $this->faker->paragraph() . '</p><p>' . $this->faker->paragraph() . '</p>',
                        ]
                    )
                    ->brick(
                        identifier: 'section',
                        path: 'mason::bricks.section',
                        values: [
                            'background_color' => 'gray',
                            'image' => null,
                            'image_position' => 'start',
                            'image_alignment' => 'top',
                            'image_flush' => false,
                            'image_rounded' => false,
                            'image_shadow' => false,
                            'text' => '<h2>' . $this->faker->sentence() . '</h2><p>' . $this->faker->paragraph() . '</p><p>' . $this->faker->paragraph() . '</p><p>' . $this->faker->paragraph() . '</p>',
                        ]
                    )
                    ->brick(
                        identifier: 'section',
                        path: 'mason::bricks.section',
                        values: [
                            'background_color' => 'white',
                            'image' => null,
                            'image_position' => 'start',
                            'image_alignment' => 'top',
                            'image_flush' => false,
                            'image_rounded' => false,
                            'image_shadow' => false,
                            'text' => '<h2>' . $this->faker->sentence() . '</h2><p>' . $this->faker->paragraph() . '</p><p>' . $this->faker->paragraph() . '</p><p>' . $this->faker->paragraph() . '</p>',
                        ]
                    )
                    ->asJson(),
            ];
        });
    }
}
