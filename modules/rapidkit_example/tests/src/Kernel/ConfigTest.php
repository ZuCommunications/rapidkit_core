<?php

declare(strict_types=1);

namespace Drupal\Tests\rapidkit_tests\Kernel;

use Drupal\Core\Config\FileStorage;
use Drupal\KernelTests\KernelTestBase;
use Drupal\views\Views;
use Drupal\webform\Entity\Webform;

final class ConfigTest extends KernelTestBase
{
    protected static array $modules = [
        "views",
        "webform",
    ];

    protected function importConfig(): void
    {
        $config_storage = new FileStorage("../config");
        $config_list = $config_storage->listAll();

        foreach ($config_list as $config_name) {
            $config_data = $config_storage->read($config_name);
            if (FALSE !== $config_data) {
                try {
                    $this->config($config_name)->setData($config_data)->save();
                } catch (\Exception) {
                }
            } else {
                throw new \Exception("Failed to read configuration for: " . $config_name . ".");
            }
        }
    }


    protected function setUp(): void
    {
        parent::setUp();
        $this->importConfig();
    }

    public function testConfig(): void
    {
        $this->testConfigForView();
        $this->testConfigForWebform();
    }

    private function testConfigForView(): void
    {
        $view = Views::getView('');
        // TODO: Add View Tests Here
        // EXAMPLE:
        // $filters = $view->getDisplay()->getOption('filters');
        // self::assertEquals('1', $filters['status']['value']);
        // self::arrserArrayHasKey('some key', $filters['type']['value']);

        // $fields = $view->getDisplay()->getOption('fields');
        // self::assertArrayHasKey('some key', $fields);

        // $pager = $view->getDisplay()->getOption('pager');
        // self::assertEquals(25, $pager['options']['items_per_page']);

        // $empty = $view->getDisplay()->getOption('empty');
        // self::assertStringContainsString("some string", $empty['area']['content']['value']);
    }

    private function testConfigForWebform(): void
    {
        $webfrom = Webform::load('');
        // TODO: Add Webform Tests Here
        // EXAMPLE:
        // $form = Webform::load('signup_form')

        // $username = $form->getElement('username')
        // self::assertTrue($username[#required], 'The username is required')

        // $phone = $form->getElement('phone');
        // self::assertArrayNotHasKey('#required', $phone, 'The phone number field is not required.');

        // $region = $form->getElement('region_selection');
        // self::assertTrue($region['#required'], 'The region field is required.');
        // self::assertEquals($region['#options'], [
        //   'Alberta' => 'Alberta',
        //   'British Columbia' => 'British Columbia',
        //   'Manitoba' => 'Manitoba',
        //   'Northwest Territories' => 'Northwest Territories',
        //   'Ontario' => 'Ontario',
        //   'Saskatchewan' => 'Saskatchewan',
        //   'Yukon' => 'Yukon',
        // ]);
    }
}