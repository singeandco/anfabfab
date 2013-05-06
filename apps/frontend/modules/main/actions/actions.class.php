<?php

/**
 * main actions.
 *
 * @package    blog
 * @subpackage main
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mainActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {

        $this->articles = new sfDoctrinePager('Article', 10);
        $this->articles->setQuery(Doctrine_Core::getTable('Article')->createQuery('a')->orderBy('created_at desc'));
        $this->articles->setPage($request->getParameter('page', 1));
        $this->articles->init();

        $this->edito = Doctrine_Core::getTable('Edito')
                ->createQuery('a')
                ->orderBy('created_at desc')
                ->execute()
                ->getFirst();

        $this->listeThemes = Doctrine_Core::getTable('Article')
                ->createQuery('select theme from article')
                ->groupBy("theme")
                ->orderBy('theme asc')
                ->execute();

        $this->commentaires = CommentaireTable::getInstance()->findAll();
    }

    public function executeRecherche(sfWebRequest $request) {

        $this->chaine = $request->getParameter('chaine');

        $this->chaine = str_replace('(', ' ', $this->chaine);
        $this->chaine = addslashes($this->chaine);

        $this->articles = ArticleTable::getAllArticlesByChaine($this->chaine);
    }

    public function executeRechercheTheme(sfWebRequest $request) {
        $this->theme = $request->getParameter('theme');

        $this->theme = str_replace('(', ' ', $this->theme);
        $this->theme = addslashes($this->theme);

        $this->articles = ArticleTable::getInstance()->findBy('theme', $this->theme);
    }

    public function executeAdmin(sfWebRequest $request) {

        if ($this->getUser()->hasAttribute("access")) {
            if ($this->getUser()->getAttribute("access") == "granted") {
                
            }
        } else {
            $this->redirect404();
        }
    }

    public function executeBeatIt(sfWebRequest $request) {
        
    }

}
