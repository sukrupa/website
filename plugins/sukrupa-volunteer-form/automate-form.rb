require 'rubygems'
require 'mechanize'

agent = Mechanize.new

page = agent.get('http://sukrupa.localhost/email_form_test/')

form = page.form('ddfm')

page = agent.submit(google_form, google_form.buttons.first)




