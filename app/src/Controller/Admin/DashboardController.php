<?php

namespace App\Controller\Admin;

use App\Entity\Job;
use App\Entity\Pnj;
use App\Entity\City;
use App\Entity\Item;
use App\Entity\Race;
use App\Entity\User;
use App\Entity\Zone;

use App\Entity\Freak;
use App\Entity\Perso;
use App\Entity\Place;
use App\Entity\Quest;
use App\Entity\PlaceTest;
use App\Entity\QuestStep;
use App\Entity\PlaceStory;
use App\Entity\PlaceStoryType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

#[IsGranted('ROLE_ADMIN')]
class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('admin/index.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('DD Adventure')
            ->renderContentMaximized()
            ->disableDarkMode()
            ->generateRelativeUrls()
            ->setLocales(['fr', 'en']);
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section();
        yield MenuItem::linkToCrud('Users', 'fas fa-users', User::class);
        yield MenuItem::linkToCrud('Persos', 'fas fa-users', Perso::class);
        yield MenuItem::linkToCrud('Races', 'fas fa-users', Race::class);
        yield MenuItem::section();
        yield MenuItem::linkToCrud('Items', 'fas fa-users', Item::class);
        yield MenuItem::section();
        yield MenuItem::linkToCrud('Zones', 'fas fa-users', Zone::class);
        yield MenuItem::linkToCrud('Cities', 'fas fa-users', City::class);
        yield MenuItem::linkToCrud('Places', 'fas fa-users', Place::class);
        yield MenuItem::section();
        yield MenuItem::linkToCrud('Quests', 'fas fa-users', Quest::class);
        yield MenuItem::linkToCrud('Quests étapes', 'fas fa-users', QuestStep::class);
        yield MenuItem::section();
        yield MenuItem::linkToCrud('Histoires étapes', 'fas fa-users', PlaceStory::class);
        yield MenuItem::linkToCrud('Type d\'étapes', 'fas fa-users', PlaceStoryType::class);
        yield MenuItem::linkToCrud('Tests', 'fas fa-users', PlaceTest::class);
        yield MenuItem::section();
        yield MenuItem::linkToCrud('Pnjs', 'fas fa-users', Pnj::class);
        yield MenuItem::linkToCrud('Jobs', 'fas fa-users', Job::class);
        yield MenuItem::linkToCrud('Monstres', 'fas fa-users', Freak::class);
    }

    public function configureUserMenu(UserInterface $user): UserMenu
    {
        // Usually it's better to call the parent method because that gives you a
        // user menu with some menu items already created ("sign out", "exit impersonation", etc.)
        // if you prefer to create the user menu from scratch, use: return UserMenu::new()->...
        return parent::configureUserMenu($user)
            // use the given $user object to get the user name
            ->setName($user->getUsername())
            
            // you can use any type of menu item, except submenus
            ->addMenuItems([
                MenuItem::section(),
                MenuItem::linkToLogout('Logout', 'fa fa-sign-out'),
            ]);
    }
}
