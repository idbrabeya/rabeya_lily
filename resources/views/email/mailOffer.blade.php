
@component('mail::message')


# Order Shipped
# 50% Off is going on

Your order has been shipped!

{{-- <x-mail::button :url="$url">
View Order
</x-mail::button> --}}
@component('mail::panel')
    This is the new product.
@endcomponent

Thanks,<br>
{{ config('app.name') }}

@endcomponent
