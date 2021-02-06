# DDD-Multirepository
DDD-Multirepository is an automatic checkout for every project on SolidJobs (even private ones).

# Install

Just follow the instructions

## Make sure you have installed and cli accessible:

- Git
- PHP >= 7.4

## Launch:

~~~
php cli.php
~~~
Returns:
~~~
[2021-02-06 16:41:30] [SOLIDJOBS] Multi repository cli init 
[2021-02-06 16:41:30] [SOLIDJOBS] WELCOME TO SOLIDJOBS CLI ASSISTANT 
[2021-02-06 16:41:30] [SOLIDJOBS] Checking dependencies... 
[2021-02-06 16:41:30] [SOLIDJOBS] PHP Version OK 
[2021-02-06 16:41:30] [SOLIDJOBS] Git OK 
[2021-02-06 16:41:30] [SOLIDJOBS] OK Dependencies 
[2021-02-06 16:41:30] [SOLIDJOBS] Installing public repositories... 
[2021-02-06 16:41:30] [SOLIDJOBS] Installing public repositories...:  
[2021-02-06 16:41:30] [SOLIDJOBS]  - webapp (SolidJobs Panel) 
Clonando en 'projects/webapp'...
remote: Enumerating objects: 229, done.
remote: Counting objects: 100% (229/229), done.
remote: Compressing objects: 100% (187/187), done.
remote: Total 229 (delta 46), reused 204 (delta 32), pack-reused 0
Recibiendo objetos: 100% (229/229), 3.76 MiB | 7.78 MiB/s, listo.
Resolviendo deltas: 100% (46/46), listo.
[2021-02-06 16:41:32] [SOLIDJOBS] Installed. 
~~~

## Check the projects/ directory

If you want to execute any project, just read its README.md
