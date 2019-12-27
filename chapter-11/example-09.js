wp.blocks.registerBlockType( 'homework/instructions', {
	// ...
	
	attributes: {
	    content: {
	        type: 'array',
	        source: 'children',
	        selector: 'p',
	    },
	    due_date: {
	        type: 'string',
	        meta: '_homework_due_date',
	        source: 'meta',
	        default: '',
	    }
	},
	
	// ...
}