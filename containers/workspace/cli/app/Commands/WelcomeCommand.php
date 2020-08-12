<?php

namespace App\Commands;

use LaravelZero\Framework\Commands\Command;

class WelcomeCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'welcome';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Displays the magicLAMP welcome message';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->line(<<<'EOD'
                                                             
                                                dP/$.
                                                $4$$%
                                              .ee$$ee.
                                           .eF3??????$C$r.        .d$$$$$$$$$$$e.
        .zeez$$$$$be..                    JP3F$5'$5K$?K?Je$.     d$$$FCLze.CC?$$$e
            """??$$$$$$$$ee..         .e$$$e$CC$???$$CC3e$$$$.  $$$/$$$$$$$$$.$$$$
                   `"?$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$b $$"$$$$P?CCe$$$$$F
                        "?$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$b$$J?bd$$$$$$$$$F"
                            "$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$d$$F"
                               "?$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$"...
                                   "?$$$$$$$$$$$$$$$$$$$$$$$$$F "$$"$$$$b
                                       "?$$$$$$$$$$$$$$$$$$F"     ?$$$$$F
                                            ""????????C"
                                            e$$$$$$$$$$$$.
                                          .$b CC$????$$F3eF
                                        4$bC/%$bdd$b@$Pd??Jbbr
                                         ""?$$$$eeee$$$$F?" 
                                          _      _               __  __ _____  
                                         (_)    | |        /\   |  \/  |  __ \ 
                    _ __ ___   __ _  __ _ _  ___| |       /  \  | \  / | |__) |
                   | '_ ` _ \ / _` |/ _` | |/ __| |      / /\ \ | |\/| |  ___/ 
                   | | | | | | (_| | (_| | | (__| |____ / ____ \| |  | | |     
                   |_| |_| |_|\__,_|\__, |_|\___|______/_/    \_\_|  |_|_|     
                                     __/ |                                     
                                    |___/                                      
        EOD);
    }
}
