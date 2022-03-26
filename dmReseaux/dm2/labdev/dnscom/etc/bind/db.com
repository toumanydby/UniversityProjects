$TTL	60000
@		IN	SOA	dnscom.com.	root.dnscom.com. (
			1 ; serial
			28 ; refresh
			14 ; retry
			3600000 ; expire
			60000 ; negative cache ttl
			)
@		IN	NS	dnscom.com.
dnscom		IN	A	42.13.37.42

perdu		IN	NS	dnsperdu.perdu.com.
dnsperdu.perdu	IN	A	8.8.8.8

ahcaira		IN	NS	dnsahcaira.ahcaira.com.
dnsahcaira.ahcaira	IN	A	9.9.9.9

ara		IN	NS	dnsara.ara.com.
dnsara.ara	IN	A	1.2.3.4
