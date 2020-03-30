
#####################################################
# Property by Your Engineering Solutions (Y.E.S.)   #
# Engineers: Lorans Hirmez, Brandon Fong            #
#####################################################

### LIBRARIES ###
from xml.dom import minidom
import xml.etree.ElementTree as ET # https://docs.python.org/3.3/library/xml.etree.elementtree.html

CLIENT = 'EarthWindFire';
XMLPath = '../../../Config/' + CLIENT + '/Site.xml';
reader = minidom.parse(XMLPath);

class xmlreader:
    def int(self, value):
        return int((reader.getElementsByTagName(value))[0].firstChild.data);

    def string(self, value):
        return str((reader.getElementsByTagName(value))[0].firstChild.data);

    def double(self, value):
        return double((reader.getElementsByTagName(value))[0].firstChild.data);
