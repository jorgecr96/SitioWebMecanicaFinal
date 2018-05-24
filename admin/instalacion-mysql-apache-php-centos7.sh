#!/bin/bash
#————————————————————————————————————————————————————————————————#
# Scriptd de instalación de mysql, php y apache		             #	
# Actualizado por:                                               #
#	Carlos Villanueva	                    	                 #
#	cvc2310@algo.com                                             #
#	Abril-2018			                        		         #
#————————————————————————————————————————————————————————————————# 

#instalacion de wget y mysql
echo "instalando wget"
yum clean all
yum -y update
yum -y install wget
wget https://dev.mysql.com/get/mysql57-community-release-el7-9.noarch.rpm
yum install mysql-community-server
mysql_secure_installation --password=



#instalación de apache
yum -y install httpd
/usr/bin/systemctl stop firewall
/usr/bin/systemctl start httpd
/usr/bin/systemctl enable httpd

#instalación de php
yum install php php-mysql php-devel php-gd php-pecl-memcache php-pspell php-snmp php-xmlrpc php-xml

