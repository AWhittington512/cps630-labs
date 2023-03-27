import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { IndexComponent } from './index/index.component';
import { ItemsComponent } from './items/items.component';
import { AboutComponent } from './about/about.component';
import { CheckoutComponent } from './checkout/checkout.component';
// import { StoreSelectorComponent } from './store-selector/store-selector.component';

const routes: Routes = [
  { path: '', component: IndexComponent },
  { path: 'items', component: ItemsComponent },
  { path: 'about', component: AboutComponent },
  { path: 'checkout', component: CheckoutComponent },
  // { path: 'sel', component: StoreSelectorComponent },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }