// read all folders in the enunciados folder

import { readdirSync,writeFileSync, readFileSync, rmdirSync } from 'node:fs';
import { join } from 'node:path';

const enunciadosPath = './phpunit/enunciados'

const enunciados = readdirSync(enunciadosPath, { withFileTypes: true })

    // only directories
    // .filter(dirent => dirent.isDirectory())
    // onlyFiles
    .filter(dirent => dirent.isFile())

console.log(enunciados.map(dirent => dirent.name));

// rename README.md to {FOLDER_NAME}.readme.md
// enunciados.forEach(dirent => {
//     const oldPath = join(enunciadosPath, dirent.name, 'README.md')
//     const newPath = join(enunciadosPath, `${dirent.name}.readme.md`)
//     writeFileSync(newPath, readFileSync(oldPath));
// })

// remove all folders found in the enunciados folder
// enunciados.forEach(dirent => {


//     const oldPath = join(enunciadosPath, dirent.name)
//     console.log(oldPath);
//     rmdirSync(oldPath, { recursive: true })
// }   )

// rename the files in the enunciados folder with the first line of the file
enunciados.forEach(dirent => {
    const oldPath = join(enunciadosPath, dirent.name)

    const content = readFileSync(oldPath, { encoding: 'utf-8' })
    const lines = content.split('\n')
    const firstLine = lines.find(line => line.startsWith('#'));
    if (!firstLine) return;


    // accent insensitive
    // const regex = /[^a-zA-Z0-9]/g;
    const regex = /[^a-zA-Z0-9\u00C0-\u00FF]/g;

    const newName = firstLine.replace('#','').trim().replace(regex, '_').toLowerCase() + '.md'
    const newPath = join(enunciadosPath,newName )
    console.log(newName);



    writeFileSync(newPath, oldPath);
});