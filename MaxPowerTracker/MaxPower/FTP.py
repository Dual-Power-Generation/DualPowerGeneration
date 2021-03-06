
#####################################################
# Property by Your Engineering Solutions (Y.E.S.)   #
# Engineers: Lorans Hirmez, Brandon Fong            #
#####################################################

### LIBRARIES ### 
from subprocess import call 
from Files import Log_Handler
from XML import xmlreader
import Files
import pysftp
import subprocess, sys, os
import traceback
import time

global file_basename;
file_basename = '..\\..\\Scripts\\FTP';
FTPXML = xmlreader();

LocalFTPDir = FTPXML.string('OutboundDir');
DestinationDir = FTPXML.string('Destination');
Hostname = FTPXML.string('Hostaddress');
Username = FTPXML.string('Username');
Password = FTPXML.string('Password');
PrivateKey = FTPXML.string('PrivateKey');
type = FTPXML.string('WhichProcedureToUseForFTP');
NoFTPSleep = FTPXML.int('NoFTPSleep');

class FTP:
    @staticmethod
    def send():
        # POWERSHELL
        if type == 'powershell':
            try:
                file = file_basename + '.ps1';
                p = subprocess.Popen(["powershell.exe", "{}".format(file)], stdout=sys.stdout);
                p.communicate();
                Log_Handler.Write_Log(os.path.basename(__file__) + "\n Sent file\n");
            except Exception as ex:
                print(ex);
                print("File not sent through ftp");
                Log_Handler.Write_Log(os.path.basename(__file__) + "\n\n" + ex + "\n\n File not sent through powershell\n");
        
        # BATCH
        elif type == 'batch':
            file = file_basename + '.bat';
            try:
                os.system('cmd /c {}' .format(file));
                Log_Handler.Write_Log(os.path.basename(__file__) + "\n Sent file\n");
            except Exception as ex:
                print(ex);
                print("File not sent through ftp");
                Log_Handler.Write_Log(os.path.basename(__file__) + "\n\n" + ex + "\n\n File not sent through batch\n");
        
        # COMMAND PROMPT
        elif type == 'commandline':
            file = file_basename + '.cmd';
            try:
                os.system('cmd /c {}' .format(file));
                Log_Handler.Write_Log(os.path.basename(__file__) + "\n Sent file\n");
            except Exception as ex:
                print(ex);
                print("File not sent through ftp");
                Log_Handler.Write_Log(os.path.basename(__file__) + "\n\n" + ex + "\n\n File not sent through cmd\n");
        
        # PYTHON
        elif type == 'python':
            try:
                cnopts = pysftp.CnOpts();
                cnopts.hostkeys = None;
                
                # Establish connection
                with pysftp.Connection(host=Hostname, username=Username, password=Password, cnopts=cnopts, private_key=PrivateKey) as sftp: # temporarily chdir to allcode
                    dest = DestinationDir + Files.filename.replace("\\", "/");
                    sftp.put(Files.fullpath, dest);  	# upload file to allcode/pycode on remote
                
                Log_Handler.Write_Log(os.path.basename(__file__) + "\n Sent file\n");
            except Exception as ex:
                print(ex);
                print("File not sent through ftp.  Check if folder exists on remote server.");
                print("\nThe error can be traced back with the following stack trace");
                track = traceback.format_exc()
                print(track)
                Log_Handler.Write_Log(os.path.basename(__file__) + "\n\n" + str(ex) + "\n\n File not sent through cmd\n\n" + str(track));
        elif type == 'redirect':
            # The issue is that I do not think I can send ftp files directly to cpanel from rpi
            # Figuring this out but making this just in case
            # Made ps1 script but not pushing since it has sensitive data
            print("Configured to use redirect.");
            time.sleep(NoFTPSleep);
        else:
            print("FTP procedure not defined.  (Please check configuration on MaxPower.xml)");
