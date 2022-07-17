PayOp Client Application
===============
This is a simple console application that represents a client for working with PayOp API.
## Available Methods

--------
### Invoice
An invoice is a basic entity in each payment. When you make a payment, you pay an invoice. Checkout transactions can be created only for invoices.
#### Create New Invoice
```bash
php payop Invoice createInvoice
```
#### Get Invoice Info
```bash
php payop Invoice getInvoice
```
#### Get Available Payment Methods
```bash
php payop Invoice getAvailablePaymentMethods
```

### Checkout
How to make payments.
#### Create bank card token
```bash
php payop Checkout createCardToken
```




