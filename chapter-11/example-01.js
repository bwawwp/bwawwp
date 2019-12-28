wp.blocks.registerBlockType( 'bwawwp/minimal', {
  title: 'Minimal Block Example',
  category: 'common',
  edit() {
    return 'Minimal block editor content.';
  },
  save() {
    return 'Minimal block frontend content.';
  },
} );