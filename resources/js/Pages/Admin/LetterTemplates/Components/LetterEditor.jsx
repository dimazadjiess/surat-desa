// import tinymce
import { Editor } from "@tinymce/tinymce-react";

export default function LetterEditor({
    value,
    onChange,
    variablesResident = [],
    variablesVillage = [],
}) {
    return (
        <Editor
            apiKey="v1jzzyeu5533qxlccwe6ixq0zlu4xedit7y58ytl56yl40vh"
            value={value}
            onEditorChange={(content) => onChange(content)}
            init={{
                height: 600,
                menubar: true,
                plugins: ["lists", "table", "code", "autolink", "link"],
                onboarding: false,
                toolbar:
                    "insertVariableVillage | insertVariableResident | bold italic underline | alignleft aligncenter alignright | " +
                    "bullist numlist | table | code",

                setup: (editor) => {
                    // custom button variable desa
                    editor.ui.registry.addMenuButton("insertVariableVillage", {
                        icon: "home",
                        text: "Desa",
                        fetch: (callback) => {
                            const items = variablesVillage.map((variable) => ({
                                type: "menuitem",
                                text: variable.label,
                                onAction: () => {
                                    editor.insertContent(`{{${variable.key}}}`);
                                },
                            }));
                            callback(items);
                        },
                    });

                    // custom button variable penduduk
                    editor.ui.registry.addMenuButton("insertVariableResident", {
                        icon: "user",
                        text: "Penduduk",
                        fetch: (callback) => {
                            const items = variablesResident.map((variable) => ({
                                type: "menuitem",
                                text: variable.label,
                                onAction: () => {
                                    editor.insertContent(`{{${variable.key}}}`);
                                },
                            }));
                            callback(items);
                        },
                    });
                },
            }}
        />
    );
}
