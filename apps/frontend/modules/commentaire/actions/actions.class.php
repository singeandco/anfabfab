<?php

/**
 * commentaire actions.
 *
 * @package    blog
 * @subpackage commentaire
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class commentaireActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        if ($this->getUser()->hasAttribute("access")) {
            if ($this->getUser()->getAttribute("access") == "granted") {

                $this->commentaires = Doctrine_Core::getTable('commentaire')
                        ->createQuery('a')
                        ->execute();
            }
        } else {
            $this->redirect404();
        }
    }

    public function executeNew(sfWebRequest $request) {

        $this->form = new commentaireForm();

        $this->titre = ArticleTable::getInstance()->find($request['article'])->getTitre();
        $this->form->setDefault('article_id', $request['article']);
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new commentaireForm();

        $this->processForm($request, $this->form);
        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {

        if ($this->getUser()->hasAttribute("access")) {
            if ($this->getUser()->getAttribute("access") == "granted") {

                $this->forward404Unless($commentaire = Doctrine_Core::getTable('commentaire')->find(array($request->getParameter('id'))), sprintf('Object commentaire does not exist (%s).', $request->getParameter('id')));
                $this->form = new commentaireForm($commentaire);
            }
        } else {
            $this->redirect404();
        }
    }

    public function executeUpdate(sfWebRequest $request) {


        if ($this->getUser()->hasAttribute("access")) {
            if ($this->getUser()->getAttribute("access") == "granted") {


                $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
                $this->forward404Unless($commentaire = Doctrine_Core::getTable('commentaire')->find(array($request->getParameter('id'))), sprintf('Object commentaire does not exist (%s).', $request->getParameter('id')));
                $this->form = new commentaireForm($commentaire);
                $this->article = ArticleTable::getInstance()->find($request['article']);

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

                $request->checkCSRFProtection();

                $this->forward404Unless($commentaire = Doctrine_Core::getTable('commentaire')->find(array($request->getParameter('id'))), sprintf('Object commentaire does not exist (%s).', $request->getParameter('id')));
                $commentaire->delete();

                $this->redirect('commentaire/index');
            }
        } else {
            $this->redirect404();
        }
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {

        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $commentaire = $form->save();



            $this->redirect('article/show?article=' . $form->getValue('article_id'));
        }
    }

}

