<template>
<v-expansion-panel>
  <v-expansion-panel-content v-for="(item,i) in 5" :key="i">
    <div slot="header">Item</div>
    <v-card>
      <v-card-text class="grey lighten-3">
        <v-select 
            v-bind:items="[{id: 1, text: 'opt1'}, {id: 2, text: 'opt2'}, {id: 3, text: 'opt3'}]"
            item-value="id"
            label="Select"
            light
            single-line
            auto
          />
      </v-card-text>
    </v-card>
  </v-expansion-panel-content>
</v-expansion-panel>
</template>