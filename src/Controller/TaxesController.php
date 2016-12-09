<?php
namespace Payroll\Controller;

use Payroll\Controller\AppController;

class TaxesController extends AppController
{

    public function index()
    {
        if ($this->request->is('post')) {
            $this->loadComponent('Payroll.Tax', ['year' => $this->request->data['year']]);

            $tax = $this->Tax->get([
                'RE4' => $this->request->data['RE4'],
                'LZZ' => $this->request->data['LZZ']
            ]);

            $this->set(compact('tax'));
        }
    }
}
