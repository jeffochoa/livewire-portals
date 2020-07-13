# Livewire Portals

Render a [Livewire](https://github.com/livewire/livewire) component on a specific target in the DOM.

## Install

THIS PACKAGE IS STILL IN DEVELOPMENT, TO USE, PLEASE ADD THE FOLLOWING REPOSITORY - NOT READY FOR PRODUCTION YET

```json
// composer.json
{
    "repositories": {
        "jeffochoa/livewire-portals": {
            "type": "vcs",
            "url": "git@github.com:jeffochoa/livewire-portals.git"
        }
    }
}
```

This package require some of the livewire directives to be registered first, so you'll need to disable the package auto-discovery and add manually the service-providers in your `config/app.php` file:

```php
// composer.json
{
    "extra": {
        "laravel": {
            "dont-discover": [
                "jeffochoa/livewire-portals",
                "livewire/livewire"
            ]
        }
    },
}
```

In the `config/app.php` file:

```php
return [
    'providers' => [
        // ...
        Livewire\LivewireServiceProvider::class,
        Jeffochoa\LivewirePortal\LivewirePortalServiceProvider::class
    ]
];
```

## Use case

Let's say you have a `message-window` livewire component to display a message in the view after running an action in the application, like a mail-list subscription.

Your mail-list subscription component is also, a livewire component.

```html
@livewire('newsletter')
```

In the component class, you'll probably have a method to handle the form submission:

```php
class Newsletter extends Component {
    public function create()
    {
        // handle subscription

        // push notification
    }
}
```

So, instead of pushing notifications through events, and so on, we just want to append the `message-window` component in the view, that's it.

How could we do that? 🤔

## Using Livewire portals

This package allows you to `open` a portal to append any livewire component in the DOM in runtime.

This is how it looks:

Open a new portal and push the `message-window` after registering a new subscription in your `newsletter` component.

```php
class Newsletter extends Component {
    public function create()
    {
        // handle subscription

        // push notification
        $this->openPortal(
            $target = 'messages-container',
            $component = 'message-window',
            $componentAttributes = ['text' => 'You are subscribed']
        );
    }
}
```

> The $componentAttributes variable will be passed down to the `message-window`'s `mount()` method.

Then, somewhere in the DOM you just need to include the new portal (container);

```html
<div
    wire:portal="messages-container"
    wire:portal.replace
    wire:portal-end="console.log('The DOM is updated')"></div>
```

> The `wire:portal.replace` is optional, if not present, then instead of replacing the container's `innerHtml`, the component will be included as a new node within the container.

Have fun 🎉

## FAQ

**Why a new package and not a pull-request to the livewire core?**

I'm using this approach right now on a project, so far it's just experimental, but if it gets enough attention, then, ideally I'd like to pull-request this changes to the livewire repository, but for now, having it as a package will give anyone the opportunity to install and test this solution.

**Why i can't install this package from packagist?**

This package is still under development, so I won't bother in to publishing it to packagist until having a more stable version.