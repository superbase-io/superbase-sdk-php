<?php


namespace SuperBaseSdk\Service\User\Command;

use Symfony\Component\Console\Helper\DescriptorHelper;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;

use SuperBaseSdk\Service\User\UserClient as SuperBaseSdkUserClient;
use SuperBaseSdk\Common\Config as SuperBaseSdkConfig;
use SuperBaseSdk\Common\SuperBase;

/**
 * UsersGetCommand retrieves a user resource.
 *
 */
class UsersGetCommand extends Command
{
    private $command;

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->ignoreValidationErrors();

        $this
            ->setName('user:usersget')
            ->setDefinition(array(
                new InputArgument('useridentifier', InputArgument::OPTIONAL, 'Username or e-mail of the requested user'),
                new InputOption('config', null, InputOption::VALUE_REQUIRED, 'Config filename', null),
            ))
            ->setDescription('Retrieves a user resource by identifier')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $useridentifier = $input->getArgument('useridentifier');

        $configfilename = null;
        if ($input->getOption('config')) {
            $configfilename = $input->getOption('config');
        }
        
        $superbase = new SuperBase();
        $config = $superbase->getConfig($configfilename);
        $userclient = $superbase->getClient('user', $config);
        
        $userclient = new SuperBaseSdkUserClient($config);
        $user = $userclient->getUser($useridentifier);
        
        echo "Loaded " . $user->getDisplayName() . "\n";
    }
}
