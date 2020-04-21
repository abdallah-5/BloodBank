from django.conf.urls import url
from . import views

app_name='note_app'

urlpatterns = [
    url(r'^$', views.all_notes , name='notes'),
    url(r'^(?P<slug>[-\w]+)/$', views.detail , name='note_detail'),
    url(r'^add$', views.note_add , name='add_note'),
    url(r'^(?P<slug>[-\w]+)/edit$', views.edit , name='note_edit'),

]
