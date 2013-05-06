<?php

/**
 * article actions.
 *
 * @package    blog
 * @subpackage article
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class articleActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $this->articles = Doctrine_Core::getTable('article')
                ->createQuery('a')
                ->groupBy('created_at')
                ->execute();
    }

    public function executeNew(sfWebRequest $request) {

        if ($this->getUser()->hasAttribute("access")) {
            if ($this->getUser()->getAttribute("access") == "granted") {
                $this->form = new articleForm();
            }
        } else {
            $this->redirect404();
        }
    }

    public function executeCreate(sfWebRequest $request) {

        if ($this->getUser()->hasAttribute("access")) {
            if ($this->getUser()->getAttribute("access") == "granted") {


                $this->forward404Unless($request->isMethod(sfRequest::POST));

                $this->form = new articleForm();

                $this->processForm($request, $this->form);

                $this->setTemplate('new');
            }
        } else {
            $this->redirect404();
        }
    }

    public function executeShow(sfWebRequest $request) {



        $this->article = ArticleTable::getInstance()->find($request['article']);
        $this->dateArticle = $this->article->dateFr($this->article->getCreated_at());

        $this->commentaires = CommentaireTable::getInstance()->findBy('article_id', $request['article']);

        if ($request['article'] != 1) {
            $this->precedent = ArticleTable::getInstance()->find($request['article'] - 1);
        } else {
            $this->precedent = ArticleTable::getInstance()->find($request['article']);
        }

        if ($request['article'] != count(ArticleTable::getInstance()->findAll())) {
            $this->suivant = ArticleTable::getInstance()->find($request['article'] + 1);
        } else {
            $this->suivant = ArticleTable::getInstance()->find($request['article']);
        }
    }

    public function executeEdit(sfWebRequest $request) {


        if ($this->getUser()->hasAttribute("access")) {
            if ($this->getUser()->getAttribute("access") == "granted") {


                $this->forward404Unless($article = Doctrine_Core::getTable('article')->find(array($request->getParameter('id'))), sprintf('Object article does not exist (%s).', $request->getParameter('id')));
                $this->form = new articleForm($article);
            }
        } else {
            $this->redirect404();
        }
    }

    public function executeUpdate(sfWebRequest $request) {

        if ($this->getUser()->hasAttribute("access")) {
            if ($this->getUser()->getAttribute("access") == "granted") {

                $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
                $this->forward404Unless($article = Doctrine_Core::getTable('article')->find(array($request->getParameter('id'))), sprintf('Object article does not exist (%s).', $request->getParameter('id')));
                $this->form = new articleForm($article);

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

                $this->forward404Unless($article = Doctrine_Core::getTable('article')->find(array($request->getParameter('id'))), sprintf('Object article does not exist (%s).', $request->getParameter('id')));
                $article->delete();

                $this->redirect('article/index');
            }
        } else {
            $this->redirect404();
        }
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {

        if ($this->getUser()->hasAttribute("access")) {
            if ($this->getUser()->getAttribute("access") == "granted") {


                $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
                if ($form->isValid()) {
                    $article = $form->save();

                    $this->redirect('article/show?article=' . $article->getId());
                }
            }
        } else {
            $this->redirect404();
        }
    }

    public function executeNewEdito(sfWebRequest $request) {

        if ($this->getUser()->hasAttribute("access")) {
            if ($this->getUser()->getAttribute("access") == "granted") {

                if ($request->hasParameter("titre") && $request->hasParameter("auteur") && $request->hasParameter("article")) {
                    $edito = new Edito();

                    $edito->setTitre($request->getParameter('titre'));
                    $edito->setAuteur($request->getParameter('auteur'));
                    $edito->setArticle($request->getParameter('article'));

                    $edito->save();
                    $this->redirect('main/index');
                }
            }
        } else {
            $this->redirect404();
        }
    }

}
