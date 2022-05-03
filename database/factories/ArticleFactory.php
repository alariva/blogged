<?php

namespace Database\Factories;

use BinaryTorch\Blogged\Models\Article;
use BinaryTorch\Blogged\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'        => $this->faker->sentence,
            'slug'         => $this->faker->unique()->slug(),
            'image'        => $this->faker->randomElement([
                'https://s3-ap-southeast-1.amazonaws.com/myseniorio/larecipe.png',
                'https://s3-ap-southeast-1.amazonaws.com/myseniorio/zino.png',
                'https://s3-ap-southeast-1.amazonaws.com/myseniorio/blogged.png',
            ]),
            'excerpt'      => $this->faker->sentence,
            'body'         => $this->faker->sentence,
            'publish_date' => $this->faker->dateTime,
            'published'    => false,
            'featured'     => false,
            'author_id'    => 1,
            'category_id'  => function() {
                return factory(Category::class)->create()->id;
            },
        ];
    }
}
