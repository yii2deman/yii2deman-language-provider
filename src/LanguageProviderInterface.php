<?php
/**
 * @link https://github.com/yii2deman/yii2deman-language-provider
 * @copyright Copyright (c) 2017 Vladimir Kuprienko
 * @license BSD 3-Clause License
 */

namespace yii2deman\tools\i18n;

/**
 * Interface for language providers.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * @since 1.0
 */
interface LanguageProviderInterface
{
    /**
     * Method should returns array with languages.
     *
     * @example
     * ```php
     * return [
     *      [
     *          'label' => 'English',
     *          'locale' => 'en-US',
     *      ],
     *      // ...
     * ];
     * ```
     * @return array
     */
    public function getLanguages();

    /**
     * Method should returns array with default language.
     *
     * @example
     * ```php
     * return [
     *      'label' => 'English',
     *      'locale' => 'en-US',
     * ];
     * ```
     * @return array
     */
    public function getDefaultLanguage();

    /**
     * Method should returns label by language locale.
     *
     * @param string $locale Language locale
     * @return mixed
     */
    public function getLanguageLabel($locale);
}
