<?php declare(strict_types=1); # -*- coding: utf-8 -*-

namespace Inpsyde\WpTranslationDownloader\Config;

use Composer\IO\IOInterface;
use Composer\Json\JsonFile;
use Inpsyde\WpTranslationDownloader\Io;

final class PluginConfigurationBuilder
{

    const KEY = 'wp-translation-downloader';

    public static function build(array $extra = []): PluginConfiguration
    {
        if (! isset($extra[self::KEY])) {
            return new PluginConfiguration([]);
        }

        $config = $extra[self::KEY];

        if (is_array($config)) {
            return new PluginConfiguration($config);
        }

        $file = new JsonFile($config);

        if ($file->exists()) {
            return new PluginConfiguration($file->read());
        }

        return new PluginConfiguration([]);
    }
}
