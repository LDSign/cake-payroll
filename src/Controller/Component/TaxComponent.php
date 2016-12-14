<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Payroll\Controller\Component;

use Cake\Controller\Component;
use Payroll\Lst2016;
use Payroll\Lst2017;
use Payroll\Soz2016;
use Payroll\Soz2017;

/**
 * Authentication control component class.
 *
 * Binds access control with user authentication and session management.
 *
 * @link http://book.cakephp.org/3.0/en/controllers/components/authentication.html
 */
class TaxComponent extends Component
{
    /**
     * Initialize config.
     *
     * @param array $config The config data.
     * @return void
     */
    public function initialize(array $config)
    {
        if (empty($config['year'])) {
            $config['year'] = date('Y');
        }

        $this->year = $config['year'];
    }

    /**
     * Calculate taxes for specified year.
     *
     * @param array $data The data used for calculation.
     * @param int $year The year
     *   If empty, the default year will be used.
     * @return array Results of calculation.
     */
    public function get(array $data, $year = null)
    {
        if (empty($year)) {
            $year = $this->year;
        }

        $this->__loadClass($year);

        $result = $this->tax->get($data);

        return $result;
    }

    /**
     * Load the vendor class.
     *
     * @param int $year The year of calculation
     * @return void
     */
    private function __loadClass($year)
    {
        require_once(ROOT . DS . 'vendor' . DS . 'ldsign' . DS . 'cake-payroll' . DS . 'src' . DS . 'Lib' . DS . 'Tax' . $year . '.php');

        $this->tax = $class;
    }
}
