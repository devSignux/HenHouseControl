
Software part (under Linux):

1. download OpenWRT sources <code>git clone git://git.openwrt.org/openwrt.git</code>
2. run <code>make menuconfig</code>
3. load config file
4. <code>make -j1</code> (set size of cpu to compile the image)

test

1. Onion Omega in Expansion Dock stecken und via USB Kabel mit Rechner verbinden
2. Prüfen ob Omega erkannt wurde mit <code>dmesg | grep cp210x</code>

 - Die ersten zwei zeilen zeigen an ob das notwendige Module cp210x gestartet wurde
  <pre>
  [    1.690607] usbcore: registered new interface driver cp210x
  [    1.690611] usbserial: USB Serial support registered for cp210x
  </pre>
 - Die nächsten zwei Zeilen zeigen an ob der Omega verbunden wurde und das er unter ttyUSB0 erreichbar ist
  <pre>
  [ 9852.407158] cp210x 1-2.4:1.0: cp210x converter detected
  [ 9852.407337] usb 1-2.4: cp210x converter now attached to ttyUSB0
  </pre>
3. (Optinal mal bei https://wiki.onion.io/Get-Started vorbei sehen)
4. Verbindung aufnehmen mit: <code>sudo screen /dev/ttyUSB0 115200</code> und "Enter"
5. CPU infor abrufen <code>cat /proc/cpuinfo</code>
  <pre>
system type             : Atheros AR9330 rev 1
machine                 : Onion Omega
processor               : 0
cpu model               : MIPS 24Kc V7.4
BogoMIPS                : 265.42
wait instruction        : yes
microsecond timers      : yes
tlb_entries             : 16
extra interrupt vector  : yes
hardware watchpoint     : yes, count: 4, address/irw mask: [0x0ffc, 0x0ffc, 0x0ffb, 0x0ffb]
isa                     : mips1 mips2 mips32r1 mips32r2
ASEs implemented        : mips16
shadow register sets    : 1
kscratch registers      : 0
package                 : 0
core                    : 0
VCED exceptions         : not available
VCEI exceptions         : not available
  </pre>
7. Speicherauslastung anzeigen <code>df</code>
  <pre>
Filesystem           1K-blocks      Used Available Use% Mounted on
rootfs                    7552       368      7184   5% /
/dev/root                 7680      7680         0 100% /rom
tmpfs                    30576       100     30476   0% /tmp
/dev/mtdblock3            7552       368      7184   5% /overlay
overlayfs:/overlay        7552       368      7184   5% /
tmpfs                      512         0       512   0% /dev
  </pre>

6. WLAN einstellen <code>wifisetup</code>
7. Optional: Image automatisch update <code>oupgrade</code> mein initiales Images war "omega-v0.1.2-b327.bin"
8. Optional: initiale Firmware wieder einspielen, siehe: https://wiki.onion.io/Tutorials/Updating-the-Omega
8. 
