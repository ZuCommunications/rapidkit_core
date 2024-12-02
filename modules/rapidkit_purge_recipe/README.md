# Rapidkit Purge Recipe

To apply this Recipe
1. Install the following Drupal modules using composer
- [Purge](https://www.drupal.org/project/purge) 
- [Varnish Purge](https://www.drupal.org/project/varnish_purge)
2. Run the Recipe command in the `/web` directory and run
```bash
lando php core/scripts/drupal recipe modules/contrib/rapidkit_core/modules/rapidkit_purge_recipe
```