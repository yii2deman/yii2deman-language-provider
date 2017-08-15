<?php
/**
 * @link https://github.com/yii2deman/yii2deman-language-provider
 * @copyright Copyright (c) 2017 Vladimir Kuprienko
 * @license BSD 3-Clause License
 */

namespace yii2deman\tools\i18n;

use yii\db\Connection;
use yii\db\Query;
use yii\di\Instance;

/**
 * Database language provider
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * @since 1.0
 */
class DbLanguageProvider implements LanguageProviderInterface
{
    /**
     * Database connection instance
     *
     * @var Connection
     */
    public $db = 'db';
    /**
     * Name of table with languages in database
     *
     * @var string
     */
    public $tableName = 'language';
    /**
     * Language locale field name in table
     *
     * @var string
     */
    public $localeField = 'locale';
    /**
     * Language name field name in table
     *
     * @var string
     */
    public $labelField = 'label';
    /**
     * Is default language flag field name in table
     *
     * @var string
     */
    public $defaultField = 'is_default';

    /**
     * @var array
     */
    protected $_languages = [];
    /**
     * @var array
     */
    protected $_defaultLanguage = [];


    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->db = Instance::ensure($this->db, Connection::class);
    }

    /**
     * @inheritdoc
     */
    public function getLanguages()
    {
        if (empty($this->_languages)) {
            $languages = (new Query())
                ->select([$this->localeField, $this->labelField])
                ->from($this->tableName)
                ->all($this->db);

            foreach ($languages as $language) {
                $this->_languages[] = [
                    'locale' => $language->{$this->localeField},
                    'label' => $language->{$this->labelField}
                ];
            }
        }

        return $this->_languages;
    }

    /**
     * @inheritdoc
     */
    public function getDefaultLanguage()
    {
        if (empty($this->_defaultLanguage)) {
            $language = (new Query())
                ->select([$this->localeField, $this->labelField])
                ->from($this->tableName)
                ->where([$this->defaultField => true])
                ->one($this->db);

            $this->_defaultLanguage = ($language !== null)
                ? ['locale' => $language->{$this->localeField}, 'label' => $language->{$this->labelField}]
                : [];
        }

        return $this->_defaultLanguage;
    }

    /**
     * @inheritdoc
     */
    public function getLanguageLabel($locale)
    {
        $languages = $this->getDefaultLanguage();
        foreach ($languages as $language) {
            if ($language['locale'] == $locale) {
                return $languages['label'];
            }
        }

        return null;
    }
}
