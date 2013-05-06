<?php

/**
 * morceau actions.
 *
 * @package    blog
 * @subpackage morceau
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class morceauActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $this->morceaux = Doctrine_Core::getTable('morceau')
                ->createQuery('a')
                ->execute();
    }

    public function executeNew(sfWebRequest $request) {

        if ($this->getUser()->hasAttribute("access")) {
            if ($this->getUser()->getAttribute("access") == "granted") {

                if (!$this->getUser()->getAttribute('access') == "granted") {
                    $this->redirect404();
                }
                $this->form = new morceauForm();
            }
        } else {
            $this->redirect404();
        }
    }

    public function executeCreate(sfWebRequest $request) {


        if ($this->getUser()->hasAttribute("access")) {
            if ($this->getUser()->getAttribute("access") == "granted") {

                if (!$this->getUser()->getAttribute('access') == "granted") {
                    $this->redirect404();
                }
                $this->forward404Unless($request->isMethod(sfRequest::POST));

                $this->form = new morceauForm();

                $this->processForm($request, $this->form);

                $this->setTemplate('new');
            }
        } else {
            $this->redirect404();
        }
    }

    public function executeEdit(sfWebRequest $request) {

        if ($this->getUser()->hasAttribute("access")) {
            if ($this->getUser()->getAttribute("access") == "granted") {

                if (!$this->getUser()->getAttribute('access') == "granted") {
                    $this->redirect404();
                }
                $this->forward404Unless($morceau = Doctrine_Core::getTable('morceau')->find(array($request->getParameter('id'))), sprintf('Object morceau does not exist (%s).', $request->getParameter('id')));
                $this->form = new morceauForm($morceau);
            }
        } else {
            $this->redirect404();
        }
    }

    public function executeUpdate(sfWebRequest $request) {

        if ($this->getUser()->hasAttribute("access")) {
            if ($this->getUser()->getAttribute("access") == "granted") {

                if (!$this->getUser()->getAttribute('access') == "granted") {
                    $this->redirect404();
                }
                $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
                $this->forward404Unless($morceau = Doctrine_Core::getTable('morceau')->find(array($request->getParameter('id'))), sprintf('Object morceau does not exist (%s).', $request->getParameter('id')));
                $this->form = new morceauForm($morceau);

                $this->processForm($request, $this->form);

                $this->setTemplate('edit');
            }
        } else {
            $this->redirect404();
        }
    }

    public function executeDelete(sfWebRequest $request) {


        if ($this->getUser()->hasAttribute("access")) {
            if ($this->getUser()->getAttribute("access") == "granted") {

                if (!$this->getUser()->getAttribute('access') == "granted") {
                    $this->redirect404();
                }
                $request->checkCSRFProtection();

                $this->forward404Unless($morceau = Doctrine_Core::getTable('morceau')->find(array($request->getParameter('id'))), sprintf('Object morceau does not exist (%s).', $request->getParameter('id')));
                $morceau->delete();

                $this->redirect('morceau/index');
            }
        } else {
            $this->redirect404();
        }
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {



        if ($this->getUser()->hasAttribute("access")) {
            if ($this->getUser()->getAttribute("access") == "granted") {
                if (!$this->getUser()->getAttribute('access') == "granted") {
                    $this->redirect404();
                }
                $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
                if ($form->isValid()) {
                    $morceau = $form->save();

                    $this->redirect('morceau/edit?id=' . $morceau->getId());
                }
            }
        } else {
            $this->redirect404();
        }
    }

}
