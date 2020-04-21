from django.db import models
from django.contrib.auth.models import User
import datetime
from django.utils.text import slugify
from django.db.models.signals import post_save

# Create your models here.

class Note(models.Model):

    user = models.ForeignKey(User , on_delete=models.CASCADE)
    title = models.CharField(max_length=50)
    slug = models.SlugField(null=True , blank=True)
    content = models.TextField(blank=True)
    created = models.DateTimeField(blank=True, default=datetime.datetime.now)
    active = models.BooleanField(default=True)
    tags = models.CharField(blank=True, max_length=100)
    img = models.ImageField(upload_to="notes-img")

    def save(self, *args, **kwargs):
        if not self.slug:
            self.slug = slugify(self.title)
        super(Note,self).save(*args,**kwargs)

    def __str__(self):
        return '%s' %(self.user)


def create_profile(sender,**kwargs):
    if kwargs['created']:
        user_profile = Profile.objects.create(user=kwargs['instance'])

post_save.connect(create_profile,sender=User)        
