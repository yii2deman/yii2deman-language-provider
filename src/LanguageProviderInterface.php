<?php
/**
 * @link https://github.com/yii2deman/yii2deman-language-provider
 * @copyright Copyright (c) 2017 Vladimir Kuprienko
 * @license BSD 3-Clause License
 */

namespace yii2deman\tools\i18n;

/**
 * Interface for language providers
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * @since 1.0
 */
interface LanguageProviderInterface
{
    /**
     * Method should returns array with languages
     * Example
     * ```php
     * return [
     *      [
     *          'label' => 'English',
     *          'locale' => 'en-US',
     *      ],
     *      // ...
     * ];
     * ```
     *
     * @return array
     */
    public function getLanguages();

    /**
     * Method should returns  array with default language
     * Example
     * ```php
     * return [
     *      'label' => 'English',
     *      'locale' => 'en-US',
     * ];
     * ```
     *
     * @return array
     */
    public function getDefaultLanguage();
}
