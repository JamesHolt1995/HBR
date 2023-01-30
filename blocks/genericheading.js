import { ToolbarGroup, ToolbarButton } from "@wordpress/components"
import { registerBlockType } from "@wordpress/blocks"
import { RichText, BlockControls } from "@wordpress/block-editor"

registerBlockType("blocks/genericheading", {
    title: "Generic Heading",
    attributes: {
        text: { type: "string" },
        size: { type: "string", default: "large" }
    },
    edit: EditComponent,
    save: SaveComponent
})


function EditComponent(props) {
    function textChange(newText) {
        props.setAttributes({ text: newText })
        tagName(props.attributes.size)
    }
    return (
        <>
            <BlockControls>
                <ToolbarGroup>
                    <ToolbarButton isPressed={props.attributes.size === "small"} onClick={() => props.setAttributes({ size: "small" })}>Small</ToolbarButton>
                    <ToolbarButton isPressed={props.attributes.size === "medium"} onClick={() => props.setAttributes({ size: "medium" })}>Medium</ToolbarButton>
                    <ToolbarButton isPressed={props.attributes.size === "large"} onClick={() => props.setAttributes({ size: "large" })}>Large</ToolbarButton>

                </ToolbarGroup>
            </BlockControls>
            <RichText allowedFormats={["core/bold", "core/italic"]} tagName={tagName(props.attributes.size)} className={`test test--${props.attributes.size}`} value={props.attributes.text} onChange={textChange} />
        </>

    )
}

function SaveComponent(props) {
    return <RichText.Content tagName={tagName(props.attributes.size)} value={props.attributes.text} className={`test test--${props.attributes.size}`} />

}

function tagName(size) {
    switch (size) {
        case "large":
            return "h1"
        case "medium":
            return "h2"
        case "small":
            return "h3"
    }
}