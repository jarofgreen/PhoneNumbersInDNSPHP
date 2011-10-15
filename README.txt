Enought with passing round phone numbers already!
=================================================

Let's put public phone numbers in the DNS system with a TXT record.

v=phone1 44 3700100222 BBC Scotland

v=phone1       = This is so we can identify our TXT records from other ones, and
                 we can deal with future versions. Required.
44             = the international country code (44 is the UK), with no spaces.
                 Required.
3700100222     = the number, with no spaces. Required.
BBC Scotland   = anything after that, including spaces is the human readable
                 name. Optional.

A domain could have several TXT records - eg for bigcompany.com
v=phone1 44 123456 Sales
v=phone1 44 123457 Accounts
v=phone1 44 1234578 Press Office

These days many of us have smart phones with internet access; it would be easy
to write a simple app where you type in a domain name and the app presents you
with a list of names and numbers, with one tap to dial.
(The app could also warn you if they were premium rate numbers.)

By using DNS, we can tap into the caching and scalability already in place.

By using subdomains, we could allow users at a domain to have an entry.
For instance, jeff@gmail.com could opt-in to publish his phone number and then
he could tell people to call jeff.gmail.com.

This repository is some simple PHP scripts to demonstrate this.
All code, and the idea, is under the BSD License
