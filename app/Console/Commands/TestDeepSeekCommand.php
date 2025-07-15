<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\DeepSeekService;

class TestDeepSeekCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deepseek:test {question?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test DeepSeek API integration';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('=== Test DeepSeek API Integration ===');

        $question = $this->argument('question') ?? 'Rekomendasi wisata di Bandung';

        try {
            $deepSeekService = new DeepSeekService();

            $this->info("Testing with question: {$question}");
            $this->newLine();

            // Test API call
            $this->info('🔄 Calling DeepSeek API...');

            try {
                $recommendations = $deepSeekService->generateTravelRecommendations($question);

                $this->info('✅ API call successful!');
                $this->newLine();

                $this->info('📋 Recommendations:');
                foreach ($recommendations as $index => $recommendation) {
                    $this->line("  " . ($index + 1) . ". " . $recommendation);
                }

            } catch (\Exception $e) {
                $this->error('❌ API call failed: ' . $e->getMessage());
                $this->warn('This is normal if API key is not set or invalid');

                // Test fallback
                $this->newLine();
                $this->info('🔄 Testing fallback to dummy data...');

                $controller = new \App\Http\Controllers\RekomendasiAIController($deepSeekService);
                $reflection = new \ReflectionClass($controller);
                $method = $reflection->getMethod('generateDummyRekomendasi');
                $method->setAccessible(true);

                $dummyResult = $method->invoke($controller, $question);

                $this->info('✅ Fallback successful!');
                $this->newLine();

                $this->info('📋 Dummy Recommendations:');
                foreach ($dummyResult as $index => $recommendation) {
                    $this->line("  " . ($index + 1) . ". " . $recommendation);
                }
            }

        } catch (\Exception $e) {
            $this->error('❌ Service initialization failed: ' . $e->getMessage());
            return 1;
        }

        $this->newLine();
        $this->info('=== Configuration Status ===');
        $this->line('API Key: ' . (config('services.deepseek.api_key') ? '✅ Set' : '❌ Not Set'));
        $this->line('Base URL: ' . config('services.deepseek.base_url'));
        $this->line('Model: ' . config('services.deepseek.model'));

        $this->newLine();
        $this->info('🎉 Test completed!');

        return 0;
    }
}
