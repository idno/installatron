Installatron Script for Known
=============================

Instructions from Installatron:
-------------------------------

The "Catalogs" method uses Installatron's Administration > Catalogs system to install and maintain your personal installers. This works the same way that most Internet-script plugin systems work (eg. Firefox).

To use "Catalogs":

* First, click Publish in the left column if you haven't already done so. This will compile the installer files using the current source.
* Download these two files (a catalog XML file and the installer distribution):
 * known2.xml
 * known2.tar.gz
* Now, find somewhere on your server that you can host the plugin. This is an intermediate location (Installatron will download the installer from here), and must be in a publicly accessible location. If you can't access this location with a web browser then it won't work as an installer repository. For example: http://my_domain.com/my_installers
* Edit the url value in the known2.xml catalog file to reflect the location chosen in the previous step. Be sure to retain the filename.
* Upload both known2.xml and known2.tar.gz to the selected installer repository.
* Now load up Installatron, navigate to Administration > Catalogs, click add catalog, and enter the URL to your catalog XML file. Continuing the example from above this could be:
 * http://my_domain.com/my_installers/known2.xml
* And finally, run Installatron Updater, by either clicking the large button in Administration > Installatron, or by using the updater script. 

Installatron will then load the catalog and update the application installer(s) named in the catalog. The application installer is now ready to use on your server. 
